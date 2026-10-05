import './echo';

let windowMessages = 0;
let windowBytes = 0;
let windowStart = Date.now();

const connectionId = crypto.randomUUID();

sessionStorage.setItem(
    'socketshield_connection_id',
    connectionId
);

fetch('/websocket/connect', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN':
            document.querySelector(
                'meta[name="csrf-token"]'
            )?.content ?? ''
    },
    body: JSON.stringify({
        connection_id: connectionId
    })
})
.then(async response => {
    const data = await response.json();

    console.log('Server response:', response.status, data);

    if (data.success) {
        sessionStorage.setItem(
            'socketshield_connection_record_id',
            data.id
        );

        console.log(
            'SocketShield connection recorded:',
            data.id
        );
    }
})
.catch(error => {
    console.error(
        'SocketShield connection error:',
        error
    );
});

window.Echo.channel('socketshield')
    .listen('.TestWebSocketEvent', async (e) => {
        console.log(
            'SocketShield event received:',
            e
        );

        const messageSize =
            new Blob([
                JSON.stringify(e)
            ]).size;

        windowMessages++;
        windowBytes += messageSize;

        const now = Date.now();
        const elapsed =
            (now - windowStart) / 1000;

        if (elapsed >= 1) {
            const messagesPerSecond =
                windowMessages / elapsed;

            const bytesPerSecond =
                windowBytes / elapsed;

            const averageMessageSize =
                windowMessages > 0
                    ? windowBytes / windowMessages
                    : 0;

            const connectionRecordId =
                sessionStorage.getItem(
                    'socketshield_connection_record_id'
                );

            console.log({
                connectionRecordId,
                messageCount: windowMessages,
                messagesPerSecond,
                bytesPerSecond,
                averageMessageSize
            });

            if (connectionRecordId) {
                const response = await fetch(
                    '/websocket/message',
                    {
                        method: 'POST',
                        headers: {
                            'Content-Type':
                                'application/json',
                            'Accept':
                                'application/json',
                            'X-CSRF-TOKEN':
                                document.querySelector(
                                    'meta[name="csrf-token"]'
                                )?.content ?? ''
                        },
                        body: JSON.stringify({
                            connection_id:
                                connectionRecordId,
                            message_count:
                                windowMessages,
                            message_size:
                                messageSize,
                            messages_per_second:
                                messagesPerSecond,
                            bytes_per_second:
                                bytesPerSecond,
                            average_message_size:
                                averageMessageSize
                        })
                    }
                );

                const data =
                    await response.json();

                console.log(
                    'Traffic metric response:',
                    response.status,
                    data
                );
            }

            windowMessages = 0;
            windowBytes = 0;
            windowStart = now;
        }
    });