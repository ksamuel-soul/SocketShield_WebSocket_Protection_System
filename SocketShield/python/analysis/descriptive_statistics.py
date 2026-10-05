import pandas as pd

INPUT_FILE = "storage/app/security_observations.csv"

df = pd.read_csv(INPUT_FILE)

features = [
    "active_connections",
    "messages_per_second",
    "message_size",
    "bytes_per_second",
    "average_message_size",
    "connection_rate",
    "reconnection_rate",
    "cpu_usage",
    "memory_usage",
    "network_bytes_sent",
    "network_bytes_received"
]

for label in ["normal", "abnormal"]:
    subset = df[df["label"] == label]

    print(f"\n===== {label.upper()} =====")

    print(
        subset[features]
        .describe()
        .T[
            [
                "count",
                "mean",
                "std",
                "min",
                "25%",
                "50%",
                "75%",
                "max"
            ]
        ]
    )