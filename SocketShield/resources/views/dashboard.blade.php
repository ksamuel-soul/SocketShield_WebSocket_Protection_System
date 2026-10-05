<x-layouts::app :title="'SocketShield Security Center'">
<style>
.socketshield {
    min-height: calc(100vh - 40px);
    background: #080b12;
    color: #d7e0ea;
    padding: 28px;
    font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
}

.ss-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 26px;
}

.ss-brand {
    display: flex;
    align-items: center;
    gap: 14px;
}

.ss-logo {
    width: 46px;
    height: 46px;
    border-radius: 12px;
    background: linear-gradient(135deg,#06b6d4,#2563eb);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 21px;
    font-weight: 800;
    box-shadow: 0 0 30px rgba(6,182,212,.18);
}

.ss-title {
    font-size: 24px;
    font-weight: 700;
    color: #f8fafc;
    letter-spacing: -.4px;
}

.ss-subtitle {
    color: #64748b;
    font-size: 13px;
    margin-top: 3px;
}

.ss-status {
    display: flex;
    align-items: center;
    gap: 9px;
    border: 1px solid #163b32;
    background: #0a1714;
    color: #4ade80;
    padding: 9px 14px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 600;
}

.ss-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #22c55e;
    box-shadow: 0 0 12px #22c55e;
}

.ss-grid {
    display: grid;
    gap: 16px;
}

.ss-grid-4 {
    grid-template-columns: repeat(4,1fr);
}

.ss-grid-3 {
    grid-template-columns: 1.15fr 1fr 1fr;
}

.ss-card {
    background: #0d111a;
    border: 1px solid #1c2533;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 8px 30px rgba(0,0,0,.16);
}

.ss-card:hover {
    border-color: #2a394c;
}

.ss-label {
    color: #64748b;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 700;
}

.ss-value {
    margin-top: 10px;
    font-size: 29px;
    font-weight: 700;
    color: #f8fafc;
}

.ss-small {
    color: #64748b;
    font-size: 12px;
    margin-top: 5px;
}

.ss-icon {
    float: right;
    width: 34px;
    height: 34px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

.icon-blue {
    background: #0c2435;
    color: #38bdf8;
}

.icon-purple {
    background: #211637;
    color: #c084fc;
}

.icon-green {
    background: #102a20;
    color: #4ade80;
}

.icon-orange {
    background: #302315;
    color: #fb923c;
}

.ss-main {
    margin-top: 16px;
}

.risk-card {
    position: relative;
    overflow: hidden;
}

.risk-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.risk-score {
    font-size: 58px;
    line-height: 1;
    font-weight: 800;
    color: #f8fafc;
}

.risk-label {
    margin-top: 8px;
    color: #64748b;
    font-size: 12px;
}

.risk-meter {
    height: 10px;
    background: #18202c;
    border-radius: 999px;
    overflow: hidden;
    margin-top: 28px;
}

.risk-fill {
    height: 100%;
    width: 0%;
    border-radius: 999px;
    background: linear-gradient(90deg,#22c55e,#eab308,#f97316,#ef4444);
    transition: width .5s ease;
}

.risk-scale {
    display: flex;
    justify-content: space-between;
    color: #475569;
    font-size: 10px;
    margin-top: 7px;
}

.defense-box {
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 185px;
}

.defense-action {
    font-size: 30px;
    font-weight: 800;
    margin-top: 12px;
    color: #4ade80;
    letter-spacing: .5px;
}

.defense-level {
    display: inline-block;
    width: fit-content;
    margin-top: 10px;
    padding: 5px 10px;
    border-radius: 6px;
    background: #102a20;
    color: #4ade80;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
}

.violation-number {
    font-size: 42px;
    font-weight: 800;
    margin-top: 12px;
    color: #f8fafc;
}

.health-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 18px;
}

.health-name {
    font-size: 13px;
    color: #94a3b8;
}

.health-value {
    font-size: 13px;
    color: #f8fafc;
    font-weight: 700;
}

.health-bar {
    height: 7px;
    background: #18202c;
    border-radius: 20px;
    overflow: hidden;
    margin-top: 8px;
}

.health-fill {
    height: 100%;
    width: 0%;
    background: #38bdf8;
    border-radius: 20px;
    transition: width .4s ease;
}

.memory-fill {
    background: #a78bfa;
}

.traffic-fill {
    background: #22c55e;
}

.summary-grid {
    display: grid;
    grid-template-columns: repeat(5,1fr);
    gap: 10px;
    margin-top: 15px;
}

.summary-item {
    background: #090d14;
    border: 1px solid #1a2431;
    border-radius: 10px;
    padding: 13px;
}

.summary-title {
    font-size: 10px;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: .8px;
}

.summary-number {
    margin-top: 5px;
    font-size: 20px;
    font-weight: 700;
    color: #e2e8f0;
}

.activity {
    margin-top: 16px;
}

.activity-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid #17202c;
}

.activity-row:last-child {
    border-bottom: 0;
}

.activity-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #22c55e;
    box-shadow: 0 0 8px rgba(34,197,94,.5);
}

.activity-text {
    flex: 1;
    font-size: 12px;
    color: #94a3b8;
}

.activity-action {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    color: #4ade80;
}

.ss-footer {
    margin-top: 18px;
    display: flex;
    justify-content: space-between;
    color: #475569;
    font-size: 11px;
}

@media(max-width:1100px) {
    .ss-grid-4 {
        grid-template-columns: repeat(2,1fr);
    }

    .ss-grid-3 {
        grid-template-columns: 1fr;
    }
}

@media(max-width:650px) {
    .socketshield {
        padding: 15px;
    }

    .ss-grid-4 {
        grid-template-columns: 1fr;
    }

    .summary-grid {
        grid-template-columns: repeat(2,1fr);
    }

    .ss-header {
        align-items: flex-start;
        gap: 15px;
    }

    .ss-status {
        display: none;
    }
}
</style>

<div class="socketshield">

    <div class="ss-header">

        <div class="ss-brand">

            <div class="ss-logo">
                SS
            </div>

            <div>
                <div class="ss-title">
                    SocketShield
                </div>

                <div class="ss-subtitle">
                    Adaptive WebSocket Security Operations Center
                </div>
            </div>

        </div>

        <div class="ss-status">
            <span class="ss-dot"></span>
            PROTECTION ENGINE ONLINE
        </div>

    </div>


    <!-- TOP METRICS -->

    <div class="ss-grid ss-grid-4">

        <div class="ss-card">

            <div class="ss-icon icon-blue">
                ◉
            </div>

            <div class="ss-label">
                Active Connections
            </div>

            <div class="ss-value" id="activeConnections">
                0
            </div>

            <div class="ss-small">
                Live WebSocket sessions
            </div>

        </div>


        <div class="ss-card">

            <div class="ss-icon icon-purple">
                ≋
            </div>

            <div class="ss-label">
                Message Rate
            </div>

            <div class="ss-value" id="messagesPerSecond">
                0
            </div>

            <div class="ss-small">
                Messages / second
            </div>

        </div>


        <div class="ss-card">

            <div class="ss-icon icon-green">
                CPU
            </div>

            <div class="ss-label">
                CPU Usage
            </div>

            <div class="ss-value" id="cpuUsage">
                0%
            </div>

            <div class="ss-small">
                Server resource pressure
            </div>

        </div>


        <div class="ss-card">

            <div class="ss-icon icon-orange">
                RAM
            </div>

            <div class="ss-label">
                Memory Usage
            </div>

            <div class="ss-value" id="memoryUsage">
                0%
            </div>

            <div class="ss-small">
                System memory utilization
            </div>

        </div>

    </div>


    <!-- SECURITY CENTER -->

    <div class="ss-grid ss-grid-3 ss-main">


        <!-- RISK -->

        <div class="ss-card risk-card">

            <div class="risk-top">

                <div>
                    <div class="ss-label">
                        Current Threat Score
                    </div>

                    <div class="risk-score" id="riskScore">
                        0
                    </div>

                    <div class="risk-label">
                        Adaptive risk evaluation · 0–100
                    </div>
                </div>

                <div>
                    <div class="ss-label">
                        Risk Level
                    </div>

                    <div
                        id="riskLevel"
                        class="defense-level">
                        LOW
                    </div>
                </div>

            </div>

            <div class="risk-meter">
                <div
                    id="riskProgress"
                    class="risk-fill">
                </div>
            </div>

            <div class="risk-scale">
                <span>SAFE</span>
                <span>MONITOR</span>
                <span>THROTTLE</span>
                <span>RESTRICT</span>
                <span>CRITICAL</span>
            </div>

        </div>

        <div class="ss-card">

    <div class="ss-label">
        Detection Status
    </div>

    <div
        id="detectionStatus"
        class="defense-action">
        NORMAL
    </div>

    <div
        id="detectionReason"
        class="ss-small">
        No abnormal behavior detected
    </div>

</div>

<div class="ss-card ss-main">

    <div class="ss-label">
        Security Experiment
    </div>

    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:12px;">

        <div>
            <div
                id="experimentScenario"
                class="ss-value"
                style="font-size:22px;">
                BASELINE
            </div>

            <div
                id="experimentDescription"
                class="ss-small">
                Normal WebSocket traffic
            </div>
        </div>

        <div
            id="experimentBadge"
            class="defense-level">
            NORMAL
        </div>

    </div>

</div>


        <!-- DEFENSE -->

        <div class="ss-card defense-box">

            <div class="ss-label">
                Adaptive Defense
            </div>

            <div
                id="defenseAction"
                class="defense-action">
                ALLOW
            </div>

            <div
                id="defenseLevel"
                class="defense-level">
                LOW RISK
            </div>

            <div class="ss-small">
                Current response selected by SocketShield
            </div>

        </div>


        <!-- VIOLATIONS -->

        <div class="ss-card defense-box">

            <div class="ss-label">
                Security Violations
            </div>

            <div
                id="violationCount"
                class="violation-number">
                0
            </div>

            <div class="ss-small">
                Detected behavioral violations
            </div>

        </div>

    </div>


    <!-- SYSTEM HEALTH -->

    <div class="ss-grid ss-grid-3 ss-main">

        <div class="ss-card">

            <div class="ss-label">
                Server Health
            </div>

            <div class="health-row">
                <span class="health-name">CPU utilization</span>
                <span class="health-value" id="cpuHealth">0%</span>
            </div>

            <div class="health-bar">
                <div
                    id="cpuBar"
                    class="health-fill">
                </div>
            </div>


            <div class="health-row">
                <span class="health-name">Memory utilization</span>
                <span class="health-value" id="memoryHealth">0%</span>
            </div>

            <div class="health-bar">
                <div
                    id="memoryBar"
                    class="health-fill memory-fill">
                </div>
            </div>

        </div>


        <div class="ss-card">

            <div class="ss-label">
                WebSocket Traffic
            </div>

            <div class="health-row">
                <span class="health-name">
                    Message throughput
                </span>

                <span
                    class="health-value"
                    id="trafficValue">
                    0 msg/s
                </span>
            </div>

            <div class="health-bar">
                <div
                    id="trafficBar"
                    class="health-fill traffic-fill">
                </div>
            </div>

            <div class="health-row">
                <span class="health-name">
                    Active sessions
                </span>

                <span
                    class="health-value"
                    id="sessionValue">
                    0
                </span>
            </div>

        </div>


        <div class="ss-card">

            <div class="ss-label">
                Protection State
            </div>

            <div class="health-row">
                <span class="health-name">
                    Monitoring engine
                </span>

                <span class="health-value" style="color:#4ade80;">
                    ACTIVE
                </span>
            </div>

            <div class="health-row">
                <span class="health-name">
                    Behavioral analysis
                </span>

                <span class="health-value" style="color:#4ade80;">
                    ACTIVE
                </span>
            </div>

            <div class="health-row">
                <span class="health-name">
                    Adaptive defense
                </span>

                <span
                    id="protectionAction"
                    class="health-value">
                    ALLOW
                </span>
            </div>

        </div>

    </div>


    <!-- DEFENSE SUMMARY -->

    <div class="ss-card ss-main">

        <div class="ss-label">
            Defense Action Distribution
        </div>

        <div class="summary-grid">

            <div class="summary-item">
                <div class="summary-title">Allow</div>
                <div class="summary-number" id="allowCount">0</div>
            </div>

            <div class="summary-item">
                <div class="summary-title">Monitor</div>
                <div class="summary-number" id="monitorCount">0</div>
            </div>

            <div class="summary-item">
                <div class="summary-title">Throttle</div>
                <div class="summary-number" id="throttleCount">0</div>
            </div>

            <div class="summary-item">
                <div class="summary-title">Restrict</div>
                <div class="summary-number" id="restrictCount">0</div>
            </div>

            <div class="summary-item">
                <div class="summary-title">Terminate</div>
                <div class="summary-number" id="terminateCount">0</div>
            </div>

        </div>

    </div>


    <!-- LIVE ACTIVITY -->

    <div class="ss-card activity">

        <div class="ss-label">
            Live Security Activity
        </div>

        <div class="activity-row">

            <span class="activity-dot"></span>

            <span class="activity-text">
                SocketShield monitoring engine initialized
            </span>

            <span class="activity-action">
                ACTIVE
            </span>

        </div>

        <div class="activity-row">

            <span class="activity-dot"></span>

            <span class="activity-text">
                WebSocket behavioral monitoring enabled
            </span>

            <span class="activity-action">
                MONITORING
            </span>

        </div>

        <div class="activity-row">

            <span
                id="activityDot"
                class="activity-dot">
            </span>

            <span
                id="activityText"
                class="activity-text">
                Waiting for latest security decision...
            </span>

            <span
                id="activityAction"
                class="activity-action">
                ALLOW
            </span>

        </div>

    </div>


    <div class="ss-footer">

        <span>
            SocketShield v1.0 · Adaptive Defense Framework
        </span>

        <span>
            Last update:
            <span id="lastUpdate">--</span>
        </span>

    </div>

</div>


<script>

function safeNumber(value, fallback = 0) {
    const number = Number(value);

    return Number.isFinite(number)
        ? number
        : fallback;
}


function updateDashboard() {

    fetch('/dashboard/metrics', {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        },
        cache: 'no-store'
    })
    .then(response => {

        if (!response.ok) {
            throw new Error(
                'Dashboard API returned HTTP ' + response.status
            );
        }

        return response.json();
    })
    .then(data => {

        const activeConnections =
            safeNumber(data.active_connections);

        const messagesPerSecond =
            safeNumber(data.messages_per_second);

        const cpuUsage =
            safeNumber(data.cpu_usage);

        const memoryUsage =
            safeNumber(data.memory_usage);

        const riskScore =
            Math.min(
                100,
                Math.max(
                    0,
                    safeNumber(data.risk_score)
                )
            );

        const riskLevel =
            String(data.risk_level || 'low').toLowerCase();

        const defenseAction =
            String(data.defense_action || 'allow').toLowerCase();

        const violationCount =
            safeNumber(data.violation_count);

        const messageCount =
            safeNumber(data.message_count);

        const messageSize =
            safeNumber(data.message_size);

        const defenseSummary =
            data.defense_summary || {};

        const allowCount =
            safeNumber(defenseSummary.allow);

        const monitorCount =
            safeNumber(defenseSummary.monitor);

        const throttleCount =
            safeNumber(defenseSummary.throttle);

        const restrictCount =
            safeNumber(defenseSummary.restrict);

        const terminateCount =
            safeNumber(defenseSummary.terminate);


        /*
        |--------------------------------------------------------------------------
        | Detection status
        |--------------------------------------------------------------------------
        */

        let detectionStatus = 'NORMAL';

        let detectionReason =
            'No abnormal behavior detected';

        if (riskScore > 30 && riskScore <= 50) {

            detectionStatus = 'ABNORMAL';

            detectionReason =
                'Behavioral deviation detected';

        } else if (riskScore > 50 && riskScore <= 70) {

            detectionStatus = 'ANOMALY DETECTED';

            detectionReason =
                'Multiple security indicators exceeded';

        } else if (riskScore > 70) {

            detectionStatus = 'CRITICAL ANOMALY';

            detectionReason =
                'High-risk abnormal behavior detected';
        }


        /*
        |--------------------------------------------------------------------------
        | Main metric cards
        |--------------------------------------------------------------------------
        */

        const activeConnectionsElement =
            document.getElementById('activeConnections');

        if (activeConnectionsElement) {
            activeConnectionsElement.textContent =
                activeConnections;
        }


        const messagesPerSecondElement =
            document.getElementById('messagesPerSecond');

        if (messagesPerSecondElement) {
            messagesPerSecondElement.textContent =
                messagesPerSecond.toFixed(2);
        }


        const cpuUsageElement =
            document.getElementById('cpuUsage');

        if (cpuUsageElement) {
            cpuUsageElement.textContent =
                cpuUsage.toFixed(1) + '%';
        }


        const memoryUsageElement =
            document.getElementById('memoryUsage');

        if (memoryUsageElement) {
            memoryUsageElement.textContent =
                memoryUsage.toFixed(1) + '%';
        }


        /*
        |--------------------------------------------------------------------------
        | Risk information
        |--------------------------------------------------------------------------
        */

        const riskScoreElement =
            document.getElementById('riskScore');

        if (riskScoreElement) {
            riskScoreElement.textContent =
                Math.round(riskScore);
        }


        const riskLevelElement =
            document.getElementById('riskLevel');

        if (riskLevelElement) {
            riskLevelElement.textContent =
                riskLevel.toUpperCase();
        }


        const riskProgressElement =
            document.getElementById('riskProgress');

        if (riskProgressElement) {
            riskProgressElement.style.width =
                riskScore + '%';
        }


        /*
        |--------------------------------------------------------------------------
        | Defense information
        |--------------------------------------------------------------------------
        */

        const defenseActionElement =
            document.getElementById('defenseAction');

        if (defenseActionElement) {
            defenseActionElement.textContent =
                defenseAction.toUpperCase();
        }


        const defenseLevelElement =
            document.getElementById('defenseLevel');

        if (defenseLevelElement) {
            defenseLevelElement.textContent =
                riskLevel.toUpperCase() + ' RISK';
        }


        const violationCountElement =
            document.getElementById('violationCount');

        if (violationCountElement) {
            violationCountElement.textContent =
                violationCount;
        }


        const protectionActionElement =
            document.getElementById('protectionAction');

        if (protectionActionElement) {
            protectionActionElement.textContent =
                defenseAction.toUpperCase();
        }


        /*
        |--------------------------------------------------------------------------
        | Detection status
        |--------------------------------------------------------------------------
        */

        const detectionStatusElement =
            document.getElementById('detectionStatus');

        if (detectionStatusElement) {

            detectionStatusElement.textContent =
                detectionStatus;

            if (riskScore <= 30) {

                detectionStatusElement.style.color =
                    '#4ade80';

            } else if (riskScore <= 50) {

                detectionStatusElement.style.color =
                    '#facc15';

            } else if (riskScore <= 70) {

                detectionStatusElement.style.color =
                    '#fb923c';

            } else {

                detectionStatusElement.style.color =
                    '#ef4444';
            }
        }


        const detectionReasonElement =
            document.getElementById('detectionReason');

        if (detectionReasonElement) {

            detectionReasonElement.textContent =
                detectionReason;
        }


        /*
        |--------------------------------------------------------------------------
        | CPU / Memory health
        |--------------------------------------------------------------------------
        */

        const cpuHealthElement =
            document.getElementById('cpuHealth');

        if (cpuHealthElement) {
            cpuHealthElement.textContent =
                cpuUsage.toFixed(1) + '%';
        }


        const memoryHealthElement =
            document.getElementById('memoryHealth');

        if (memoryHealthElement) {
            memoryHealthElement.textContent =
                memoryUsage.toFixed(1) + '%';
        }


        const cpuBarElement =
            document.getElementById('cpuBar');

        if (cpuBarElement) {

            cpuBarElement.style.width =
                Math.min(
                    100,
                    Math.max(0, cpuUsage)
                ) + '%';
        }


        const memoryBarElement =
            document.getElementById('memoryBar');

        if (memoryBarElement) {

            memoryBarElement.style.width =
                Math.min(
                    100,
                    Math.max(0, memoryUsage)
                ) + '%';
        }


        /*
        |--------------------------------------------------------------------------
        | WebSocket traffic
        |--------------------------------------------------------------------------
        */

        const trafficValueElement =
            document.getElementById('trafficValue');

        if (trafficValueElement) {

            trafficValueElement.textContent =
                messagesPerSecond.toFixed(2) +
                ' msg/s';
        }


        const sessionValueElement =
            document.getElementById('sessionValue');

        if (sessionValueElement) {

            sessionValueElement.textContent =
                activeConnections;
        }


        const trafficBarElement =
            document.getElementById('trafficBar');

        if (trafficBarElement) {

            trafficBarElement.style.width =
                Math.min(
                    100,
                    messagesPerSecond * 5
                ) + '%';
        }


        /*
        |--------------------------------------------------------------------------
        | Defense action distribution
        |--------------------------------------------------------------------------
        */

        const allowCountElement =
            document.getElementById('allowCount');

        if (allowCountElement) {
            allowCountElement.textContent =
                allowCount;
        }


        const monitorCountElement =
            document.getElementById('monitorCount');

        if (monitorCountElement) {
            monitorCountElement.textContent =
                monitorCount;
        }


        const throttleCountElement =
            document.getElementById('throttleCount');

        if (throttleCountElement) {
            throttleCountElement.textContent =
                throttleCount;
        }


        const restrictCountElement =
            document.getElementById('restrictCount');

        if (restrictCountElement) {
            restrictCountElement.textContent =
                restrictCount;
        }


        const terminateCountElement =
            document.getElementById('terminateCount');

        if (terminateCountElement) {
            terminateCountElement.textContent =
                terminateCount;
        }


        /*
        |--------------------------------------------------------------------------
        | Live security activity
        |--------------------------------------------------------------------------
        */

        const activityTextElement =
            document.getElementById('activityText');

        const activityActionElement =
            document.getElementById('activityAction');

        const activityDotElement =
            document.getElementById('activityDot');


        if (activityTextElement) {

            activityTextElement.textContent =
                detectionReason +
                ' · Risk score: ' +
                Math.round(riskScore);
        }


        if (activityActionElement) {

            activityActionElement.textContent =
                defenseAction.toUpperCase();
        }


        if (activityDotElement) {

            if (riskScore <= 30) {

                activityDotElement.style.background =
                    '#22c55e';

                activityDotElement.style.boxShadow =
                    '0 0 8px rgba(34,197,94,.6)';

            } else if (riskScore <= 50) {

                activityDotElement.style.background =
                    '#facc15';

                activityDotElement.style.boxShadow =
                    '0 0 8px rgba(250,204,21,.6)';

            } else if (riskScore <= 70) {

                activityDotElement.style.background =
                    '#fb923c';

                activityDotElement.style.boxShadow =
                    '0 0 8px rgba(251,146,60,.6)';

            } else {

                activityDotElement.style.background =
                    '#ef4444';

                activityDotElement.style.boxShadow =
                    '0 0 8px rgba(239,68,68,.7)';
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Experiment information
        |--------------------------------------------------------------------------
        */

        const experimentScenarioElement =
            document.getElementById(
                'experimentScenario'
            );

        const experimentDescriptionElement =
            document.getElementById(
                'experimentDescription'
            );

        const experimentBadgeElement =
            document.getElementById(
                'experimentBadge'
            );


        if (riskScore <= 30) {

            if (experimentScenarioElement) {

                experimentScenarioElement.textContent =
                    'BASELINE';
            }

            if (experimentDescriptionElement) {

                experimentDescriptionElement.textContent =
                    'Normal WebSocket behavior';
            }

            if (experimentBadgeElement) {

                experimentBadgeElement.textContent =
                    'NORMAL';
            }

        } else {

            if (experimentScenarioElement) {

                experimentScenarioElement.textContent =
                    'ABNORMAL TRAFFIC';
            }

            if (experimentDescriptionElement) {

                experimentDescriptionElement.textContent =
                    detectionReason;
            }

            if (experimentBadgeElement) {

                experimentBadgeElement.textContent =
                    detectionStatus;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Last update
        |--------------------------------------------------------------------------
        */

        const lastUpdateElement =
            document.getElementById('lastUpdate');

        if (lastUpdateElement) {

            lastUpdateElement.textContent =
                new Date().toLocaleTimeString();
        }


        /*
        |--------------------------------------------------------------------------
        | Debug information
        |--------------------------------------------------------------------------
        */

        console.log(
            'SocketShield telemetry:',
            {
                activeConnections,
                messagesPerSecond,
                messageCount,
                messageSize,
                cpuUsage,
                memoryUsage,
                riskScore,
                riskLevel,
                detectionStatus,
                defenseAction,
                violationCount,
                defenseSummary
            }
        );
    })
    .catch(error => {

        console.error(
            'SocketShield dashboard error:',
            error
        );


        const activityTextElement =
            document.getElementById('activityText');

        if (activityTextElement) {

            activityTextElement.textContent =
                'Unable to retrieve security telemetry';
        }


        const activityActionElement =
            document.getElementById('activityAction');

        if (activityActionElement) {

            activityActionElement.textContent =
                'OFFLINE';
        }


        const detectionStatusElement =
            document.getElementById('detectionStatus');

        if (detectionStatusElement) {

            detectionStatusElement.textContent =
                'TELEMETRY ERROR';

            detectionStatusElement.style.color =
                '#ef4444';
        }
    });
}

updateDashboard();

setInterval(
    updateDashboard,
    2000
);

</script>

</x-layouts::app>