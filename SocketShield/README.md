# 🛡️ SocketShield

## Adaptive Resource-Aware Defense Framework for Application-Layer Denial-of-Service Attacks in Laravel Reverb WebSocket Networks

<p align="center">

<img src="https://img.shields.io/badge/Laravel-13-red?style=for-the-badge&logo=laravel" />
<img src="https://img.shields.io/badge/PHP-8.4-blue?style=for-the-badge&logo=php" />
<img src="https://img.shields.io/badge/Reverb-WebSocket-purple?style=for-the-badge" />
<img src="https://img.shields.io/badge/Python-3.x-yellow?style=for-the-badge&logo=python" />
<img src="https://img.shields.io/badge/FastAPI-API-green?style=for-the-badge&logo=fastapi" />
<img src="https://img.shields.io/badge/SQLite-Database-blue?style=for-the-badge&logo=sqlite" />
<img src="https://img.shields.io/badge/Research-Project-orange?style=for-the-badge" />

</p>

---

## 📌 Overview

**SocketShield** is a research-oriented security framework designed to detect and respond to abnormal application-layer traffic in WebSocket applications built using **Laravel Reverb**.

Unlike traditional request-based security mechanisms that primarily focus on request frequency or IP-based rate limiting, SocketShield investigates a **resource-aware behavioral defense model**.

The framework combines:

- WebSocket connection monitoring
- Message-rate monitoring
- Message-size analysis
- Network traffic measurements
- CPU utilization
- Memory utilization
- Statistical anomaly detection
- Rule-based detection
- Risk scoring
- Violation tracking
- Adaptive defense actions
- Security experiment logging
- Real-time security visualization

The core idea is:

```text
Observe
   ↓
Extract Features
   ↓
Detect Abnormal Behavior
   ↓
Calculate Risk
   ↓
Select Defense
   ↓
Apply Adaptive Response
   ↓
Visualize Security State
```

SocketShield is developed primarily as an **academic research prototype** and is intended for controlled experiments in an environment owned or explicitly authorized by the researcher.

---

# 🎯 Research Title

> **SocketShield: An Adaptive Resource-Aware Defense Framework for Application-Layer Denial-of-Service Attacks in Laravel Reverb WebSocket Networks**

---

# 🔬 Research Question

> **Can an adaptive, resource-aware defense mechanism detect and mitigate application-layer DoS-like behavior against persistent WebSocket communication while preserving the performance and availability of legitimate users?**

---

# 💡 Motivation

WebSocket applications provide persistent, bidirectional communication and are widely used in:

- Real-time dashboards
- Chat applications
- Collaborative applications
- Online games
- Notification systems
- Monitoring systems
- Financial applications
- IoT platforms

However, persistent connections introduce security challenges.

An abnormal client may generate:

- Excessive messages
- High message rates
- Large message volumes
- Repeated connections
- Reconnection behavior
- Excessive concurrent sessions
- Resource pressure

A security mechanism that considers only request frequency may not adequately represent the behavior of a persistent WebSocket connection.

SocketShield therefore investigates the combination of:

```text
WebSocket Behavior
        +
Server Resource State
        +
Statistical Analysis
        +
Risk Scoring
        +
Adaptive Defense
```

---

# 🎯 Objectives

The major objectives of the project are:

1. Build a WebSocket application using Laravel Reverb.
2. Monitor WebSocket connection behavior.
3. Measure WebSocket traffic characteristics.
4. Monitor server CPU and memory utilization.
5. Store security observations for research analysis.
6. Generate a dataset containing normal and controlled abnormal observations.
7. Implement rule-based detection.
8. Implement statistical anomaly detection.
9. Calculate a normalized risk score.
10. Map risk scores to defense actions.
11. Implement adaptive defense based on repeated violations.
12. Visualize the security state through a real-time dashboard.
13. Compare different detection and defense approaches.
14. Evaluate the effectiveness of the proposed approach using experimental metrics.

---

# 🏗️ System Architecture

```text
                         ┌───────────────────────┐
                         │        Clients        │
                         │   Browser / WebSocket │
                         └───────────┬───────────┘
                                     │
                                     ▼
                         ┌───────────────────────┐
                         │   Laravel Application │
                         │    PHP + Livewire     │
                         └───────────┬───────────┘
                                     │
                                     ▼
                         ┌───────────────────────┐
                         │    Laravel Reverb     │
                         │    WebSocket Server   │
                         └───────────┬───────────┘
                                     │
                                     ▼
                 ┌────────────────────────────────────┐
                 │       SocketShield Monitoring      │
                 ├────────────────────────────────────┤
                 │ Connection Monitoring               │
                 │ Message Monitoring                  │
                 │ Resource Monitoring                 │
                 └────────────────┬───────────────────┘
                                  │
                                  ▼
                 ┌────────────────────────────────────┐
                 │        Feature Extraction          │
                 ├────────────────────────────────────┤
                 │ Messages / Second                  │
                 │ Bytes / Second                     │
                 │ Message Size                       │
                 │ Active Connections                  │
                 │ Connection Rate                    │
                 │ CPU Usage                           │
                 │ Memory Usage                        │
                 │ Network Activity                   │
                 └────────────────┬───────────────────┘
                                  │
                                  ▼
                 ┌────────────────────────────────────┐
                 │         Detection Engine           │
                 ├────────────────────────────────────┤
                 │ Rule-Based Detection               │
                 │ Statistical Detection              │
                 └────────────────┬───────────────────┘
                                  │
                                  ▼
                 ┌────────────────────────────────────┐
                 │           Risk Scoring             │
                 │              0 - 100               │
                 └────────────────┬───────────────────┘
                                  │
                                  ▼
                 ┌────────────────────────────────────┐
                 │        Adaptive Defense            │
                 ├────────────────────────────────────┤
                 │ Allow                              │
                 │ Monitor                            │
                 │ Throttle                           │
                 │ Restrict                           │
                 │ Terminate                          │
                 └────────────────┬───────────────────┘
                                  │
                                  ▼
                 ┌────────────────────────────────────┐
                 │       Security Dashboard           │
                 │ Detection + Risk + Defense         │
                 └────────────────────────────────────┘


                 ┌──────────────────────────────┐
                 │ Python Resource Monitor      │
                 │ FastAPI + psutil             │
                 └──────────────┬───────────────┘
                                │
                                ▼
                    CPU / Memory / Network
```

---

# 🔄 Complete Detection Pipeline

```text
WebSocket Activity
        │
        ▼
Connection / Message Monitoring
        │
        ▼
Traffic Feature Collection
        │
        ▼
Server Resource Collection
        │
        ▼
Feature Engineering
        │
        ├───────────────┐
        ▼               ▼
 Rule Detection    Statistical Detection
        │               │
        └───────┬───────┘
                ▼
          Risk Scoring
                │
                ▼
          Risk Classification
                │
                ▼
        Adaptive Defense
                │
                ▼
      Security Decision
                │
                ▼
          Database
                │
                ▼
       Security Dashboard
```

---

# 🧩 Main Components

## 1. WebSocket Monitoring

SocketShield maintains information about WebSocket connections.

Tracked information includes:

- Connection ID
- User ID
- IP address
- User agent
- Connection timestamp
- Last heartbeat
- Disconnection timestamp
- Message count
- Connection status
- Risk score
- Defense action
- Violation count
- Restriction expiry

---

## 2. Traffic Monitoring

The system records traffic-related features including:

| Feature | Description |
|---|---|
| `message_count` | Number of messages observed |
| `message_size` | Size of the observed message |
| `messages_per_second` | Message frequency |
| `bytes_per_second` | Traffic volume per second |
| `average_message_size` | Average message size |
| `connection_rate` | Connection activity |
| `reconnection_rate` | Prototype reconnection-related metric |

---

# 🖥️ Resource Monitoring

SocketShield uses a Python service based on **FastAPI** and **psutil**.

The service collects:

```text
CPU Usage
Memory Usage
Memory Used
Total Memory
Network Bytes Sent
Network Bytes Received
```

Architecture:

```text
Laravel
   │
   │ HTTP
   ▼
FastAPI
   │
   ▼
psutil
   │
   ├── CPU
   ├── Memory
   └── Network
```

Python endpoint:

```text
GET /resources
```

Health endpoint:

```text
GET /health
```

---

# 🧠 Feature Engineering

The collected observations are transformed into additional analytical features.

## Network Total

```text
network_total =
network_bytes_sent + network_bytes_received
```

## Connection Density

```text
connection_density =
active_connections / messages_per_second
```

## Message Load

```text
message_load =
messages_per_second × message_size
```

## Traffic Load

```text
traffic_load =
messages_per_second × average_message_size
```

## Resource Pressure

```text
resource_pressure =
(cpu_usage + memory_usage) / 2
```

These features are intended to capture relationships between traffic behavior and server resource pressure.

---

# 🚨 Detection Engine

SocketShield currently implements two primary detection approaches.

## Rule-Based Detection

The rule detector evaluates predefined experimental thresholds.

Current initial thresholds include:

| Feature | Threshold |
|---|---:|
| Messages / second | `> 10` |
| Bytes / second | `> 5000` |
| Active connections | `> 20` |
| CPU usage | `> 80%` |
| Memory usage | `> 80%` |

The rule detector generates:

```text
Risk Score
Violated Features
Classification
Recommended Action
```

### Important

These values are **experimental starting thresholds**.

They should not be interpreted as universally valid security thresholds. Final thresholds should be evaluated and tuned using collected experimental data.

---

# 📊 Statistical Anomaly Detection

SocketShield also includes a baseline statistical detector.

Normal observations are used to calculate:

```text
Mean
Standard Deviation
```

The initial anomaly threshold is:

```text
Threshold = Mean + 3 × Standard Deviation
```

If an observation exceeds one or more feature thresholds, it can be classified as anomalous.

This provides a statistical alternative to fixed rule thresholds.

---

# ⚖️ Risk Scoring

SocketShield converts multiple security indicators into a score between:

```text
0 - 100
```

Current experimental risk levels:

| Score | Level | Action |
|---:|---|---|
| `0 - 30` | LOW | ALLOW |
| `31 - 50` | MODERATE | MONITOR |
| `51 - 70` | HIGH | THROTTLE |
| `71 - 85` | VERY HIGH | RESTRICT |
| `86 - 100` | CRITICAL | TERMINATE |

Conceptually:

```text
Low Risk
   ↓
Allow

Moderate Risk
   ↓
Monitor

High Risk
   ↓
Throttle

Very High Risk
   ↓
Restrict

Critical Risk
   ↓
Terminate
```

---

# 🛡️ Adaptive Defense

The key concept of SocketShield is that abnormal behavior does not necessarily result in immediate termination.

The defense mechanism can escalate based on:

- Current risk score
- Number of violations
- Repeated abnormal behavior

Example:

```text
                    NORMAL
                       │
                       ▼
                    ALLOW
                       │
                       ▼
              ABNORMAL BEHAVIOR
                       │
                       ▼
                   MONITOR
                       │
                       ▼
            REPEATED VIOLATIONS
                       │
                       ▼
                   THROTTLE
                       │
                       ▼
             HIGH-RISK BEHAVIOR
                       │
                       ▼
                   RESTRICT
                       │
                       ▼
           PERSISTENT CRITICAL RISK
                       │
                       ▼
                  TERMINATE
```

This is intended to reduce unnecessary disruption to legitimate users.

---

# 🗃️ Database Models

## WebSocketConnection

Table:

```text
websocket_connections
```

Important fields:

```text
connection_id
user_id
ip_address
user_agent
connected_at
last_heartbeat_at
disconnected_at
message_count
status
defense_action
risk_score
violation_count
restricted_until
```

## TrafficMetric

Table:

```text
traffic_metrics
```

Important fields:

```text
connection_id
message_count
message_size
messages_per_second
bytes_per_second
average_message_size
connection_rate
reconnection_rate
measured_at
```

## ResourceMetric

Table:

```text
resource_metrics
```

Important fields:

```text
cpu_usage
memory_usage
active_connections
messages_per_second
measured_at
```

## SecurityObservation

Table:

```text
security_observations
```

Important fields:

```text
active_connections
messages_per_second
message_size
bytes_per_second
average_message_size
connection_rate
reconnection_rate
cpu_usage
memory_usage
network_bytes_sent
network_bytes_received
scenario
label
experiment_id
collected_at
```

## SecurityDecision

Table:

```text
security_decisions
```

Important fields:

```text
connection_id
risk_score
risk_level
action
reason
decided_at
```

## Experiment

Table:

```text
experiments
```

Important fields:

```text
name
scenario
description
duration_seconds
status
started_at
ended_at
```

---

# 📁 Project Structure

```text
SocketShield/
│
├── app/
│   ├── Events/
│   │   └── TestWebSocketEvent.php
│   │
│   ├── Http/
│   │   └── Controllers/
│   │       ├── DashboardController.php
│   │       ├── ResourceController.php
│   │       └── WebSocketController.php
│   │
│   ├── Models/
│   │   ├── WebSocketConnection.php
│   │   ├── TrafficMetric.php
│   │   ├── ResourceMetric.php
│   │   ├── SecurityObservation.php
│   │   ├── SecurityDecision.php
│   │   └── Experiment.php
│   │
│   └── Services/
│       ├── ResourceMonitorService.php
│       ├── PythonResourceService.php
│       ├── TrafficFeatureService.php
│       └── RiskScoringService.php
│
├── database/
│   └── migrations/
│
├── resources/
│   ├── js/
│   │   ├── app.js
│   │   └── echo.js
│   │
│   └── views/
│       ├── dashboard.blade.php
│       └── welcome.blade.php
│
├── routes/
│   ├── web.php
│   └── console.php
│
├── python/
│   ├── api/
│   │   └── app.py
│   │
│   ├── analysis/
│   │   ├── __init__.py
│   │   ├── feature_engineering.py
│   │   ├── baseline_analysis.py
│   │   ├── compare_scenarios.py
│   │   └── descriptive_statistics.py
│   │
│   ├── detection/
│   │   ├── statistical_detector.py
│   │   ├── rule_detector.py
│   │   ├── evaluate_rules.py
│   │   ├── compare_detectors.py
│   │   ├── evaluate_statistical.py
│   │   ├── risk_scorer.py
│   │   └── evaluate_risk.py
│   │
│   ├── dataset/
│   │   ├── normal/
│   │   ├── abnormal/
│   │   └── processed/
│   │
│   ├── models/
│   │
│   ├── resource_monitor.py
│   └── requirements.txt
│
├── storage/
│   └── app/
│       └── security_observations.csv
│
├── tests/
│
├── artisan
├── composer.json
├── package.json
├── vite.config.js
└── README.md
```

---

# 🛠️ Technology Stack

| Layer | Technology |
|---|---|
| Backend | PHP / Laravel |
| WebSocket | Laravel Reverb |
| Frontend | Blade / Livewire / JavaScript |
| WebSocket Client | Laravel Echo / Pusher JS |
| Database | SQLite |
| Resource API | FastAPI |
| Resource Monitoring | psutil |
| Data Processing | Pandas / NumPy |
| ML/Analytics | scikit-learn / Joblib |
| Build Tool | Vite |
| Testing | Pest / PHPUnit |
| Network Analysis | Wireshark |
| Version Control | Git / GitHub |

---

# ⚙️ Installation

## Requirements

Install:

- PHP 8.4+
- Composer
- Node.js
- npm
- Python 3
- SQLite
- Git

Verify:

```bash
php -v
composer -V
node -v
npm -v
python3 --version
git --version
```

---

## Clone Repository

```bash
git clone https://github.com/<YOUR_USERNAME>/SocketShield.git
cd SocketShield
```

---

## Install Laravel Dependencies

```bash
composer install
```

---

## Install Frontend Dependencies

```bash
npm install
```

---

## Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

---

# 🗄️ SQLite Configuration

Create the database:

```bash
touch database/database.sqlite
```

Set:

```env
DB_CONNECTION=sqlite
```

Run migrations:

```bash
php artisan migrate
```

---

# 🐍 Python Environment

Create a virtual environment:

```bash
python3 -m venv venv
```

Activate:

```bash
source venv/bin/activate
```

Install dependencies:

```bash
pip install -r python/requirements.txt
```

---

# 🔐 Reverb Configuration

Install broadcasting support if required:

```bash
php artisan install:broadcasting --reverb
```

Install Echo:

```bash
npm install laravel-echo pusher-js
```

Example local Reverb configuration:

```env
REVERB_HOST=127.0.0.1
REVERB_PORT=8080
REVERB_SCHEME=http
```

Vite configuration:

```env
VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="${REVERB_HOST}"
VITE_REVERB_PORT="${REVERB_PORT}"
VITE_REVERB_SCHEME="${REVERB_SCHEME}"
```

Use the actual values generated by your Laravel/Reverb installation.

**Never commit `.env` or secrets to GitHub.**

---

# ▶️ Running the Project

SocketShield uses multiple processes.

## Terminal 1 — Laravel

```bash
php artisan serve
```

Application:

```text
http://127.0.0.1:8000
```

## Terminal 2 — Reverb

```bash
php artisan reverb:start
```

## Terminal 3 — Vite

```bash
npm run dev
```

## Terminal 4 — Python API

```bash
source venv/bin/activate
uvicorn python.api.app:app --reload --port 9000
```

## Terminal 5 — Scheduler

```bash
php artisan schedule:work
```

---

# 🧪 Verify Python Resource Monitoring

Health endpoint:

```text
http://127.0.0.1:9000/health
```

Expected:

```json
{
    "status": "ok",
    "service": "SocketShield Resource Monitor"
}
```

Resource endpoint:

```text
http://127.0.0.1:9000/resources
```

Example:

```json
{
    "cpu_usage": 14.5,
    "memory_usage": 52.8,
    "memory_used": 9000000000,
    "memory_total": 17179869184,
    "network_bytes_sent": 123456,
    "network_bytes_received": 654321
}
```

---

# 📡 Laravel Monitoring Endpoints

| Method | Endpoint | Purpose |
|---|---|---|
| POST | `/websocket/connect` | Record connection |
| POST | `/websocket/heartbeat` | Update heartbeat |
| POST | `/websocket/disconnect` | Record disconnect |
| POST | `/websocket/message` | Record traffic and calculate risk |
| GET | `/monitor/resources` | Collect resource metrics |
| GET | `/dashboard/metrics` | Dashboard telemetry |
| GET | `/test-websocket` | Controlled test event |

---

# 🖥️ Dashboard

Open:

```text
http://127.0.0.1:8000/dashboard
```

The dashboard provides a security-operations-style interface displaying:

```text
Active Connections
Messages / Second
CPU Usage
Memory Usage
Threat Score
Risk Level
Detection Status
Defense Action
Violation Count
Server Health
WebSocket Traffic
Defense Distribution
Live Security Activity
Last Update
```

The frontend retrieves telemetry from:

```text
/dashboard/metrics
```

and refreshes periodically.

---

# 🔌 WebSocket Verification

Open:

```text
http://127.0.0.1:8000/dashboard
```

Then open:

```text
http://127.0.0.1:8000/test-websocket
```

The application broadcasts:

```text
TestWebSocketEvent
```

The dashboard listens using Laravel Echo.

Expected browser console output:

```text
Reverb connected
```

followed by:

```text
SocketShield event received
```

---

# 📈 Demonstrating Normal Behavior

Start all services.

Open:

```text
http://127.0.0.1:8000/dashboard
```

Allow the system to run under normal conditions.

Expected:

```text
Detection Status
NORMAL

Risk Level
LOW

Defense Action
ALLOW
```

The exact values depend on the host machine and current application activity.

---

# ⚠️ Demonstrating Controlled Abnormal Behavior

For a small bounded local experiment:

```bash
for i in {1..10}; do
    curl -s http://127.0.0.1:8000/test-websocket > /dev/null
done
```

Another bounded experiment:

```bash
for i in {1..15}; do
    curl -s http://127.0.0.1:8000/test-websocket > /dev/null
done
```

These commands target:

```text
127.0.0.1
```

and are intended only for the SocketShield local research environment.

---

# 🔍 Expected Detection Demonstration

A research demonstration should show:

```text
NORMAL
   ↓
Traffic increases
   ↓
Behavioral deviation
   ↓
ABNORMAL
   ↓
Risk score increases
   ↓
ANOMALY DETECTED
   ↓
Adaptive Defense
```

Depending on actual measurements, the defense may progress through:

```text
ALLOW
MONITOR
THROTTLE
RESTRICT
TERMINATE
```

The UI must display the actual backend decision rather than simulate a defense action.

---

# 🧪 Research Experiment Design

## Scenario 1 — Baseline

Normal WebSocket activity.

Purpose:

```text
Establish normal behavioral characteristics.
```

Label:

```text
normal
```

---

## Scenario 2 — Controlled Abnormal Traffic

Bounded abnormal traffic inside the local research environment.

Purpose:

```text
Identify behavioral deviations.
```

Label:

```text
abnormal
```

---

## Scenario 3 — Adaptive Defense

Evaluate how SocketShield responds when abnormal behavior persists.

Purpose:

```text
Evaluate adaptive mitigation.
```

---

# 📊 Research Comparison

The final evaluation can compare:

```text
No Defense
     ↓
Static Rule Defense
     ↓
Statistical Detection
     ↓
SocketShield Adaptive Defense
```

Recommended metrics:

| Metric | Purpose |
|---|---|
| Accuracy | Overall classification |
| Precision | Correct positive detections |
| Recall | Ability to detect abnormal behavior |
| F1-score | Balanced detection performance |
| False Positive Rate | Legitimate traffic incorrectly flagged |
| False Negative Rate | Abnormal behavior missed |
| Detection Latency | Time to identify abnormality |
| CPU Usage | Resource impact |
| Memory Usage | Memory impact |
| Message Throughput | WebSocket performance |
| Active Connections | Connection handling |
| Defense Response Time | Mitigation speed |
| Availability | Service preservation |

---

# 📁 Dataset Pipeline

```text
Laravel
   ↓
SecurityObservation
   ↓
CSV Export
   ↓
Feature Engineering
   ↓
Processed Dataset
   ↓
Detection
   ↓
Risk Scoring
   ↓
Evaluation
```

Exported dataset:

```text
storage/app/security_observations.csv
```

Processed data:

```text
python/dataset/processed/
```

---

# 📊 Dataset Fields

```text
id
active_connections
messages_per_second
message_size
bytes_per_second
average_message_size
connection_rate
reconnection_rate
cpu_usage
memory_usage
network_bytes_sent
network_bytes_received
scenario
label
experiment_id
collected_at
```

---

# 🧮 Analysis Commands

## Feature Engineering

```bash
python python/analysis/feature_engineering.py
```

## Scenario Comparison

```bash
python python/analysis/compare_scenarios.py
```

Output:

```text
python/dataset/processed/feature_comparison.csv
```

## Descriptive Statistics

```bash
python python/analysis/descriptive_statistics.py
```

## Rule-Based Detection

```bash
python python/detection/rule_detector.py
```

## Rule Evaluation

```bash
python python/detection/evaluate_rules.py
```

## Statistical Detection

```bash
python python/detection/statistical_detector.py
```

## Statistical Evaluation

```bash
python python/detection/evaluate_statistical.py
```

## Detector Comparison

```bash
python python/detection/compare_detectors.py
```

## Risk Scoring

```bash
python python/detection/risk_scorer.py
```

## Risk Evaluation

```bash
python python/detection/evaluate_risk.py
```

---

# 🧪 Laravel Experiment Commands

## Baseline

Example:

```bash
php artisan socketshield:baseline 120
```

This records approximately 120 seconds of baseline observations.

## Controlled Abnormal Experiment

Example:

```bash
php artisan socketshield:abnormal 30
```

This records a bounded controlled abnormal-traffic experiment.

Perform experiments only against the local SocketShield application.

---

# 📤 Dataset Export

Security observations are exported to:

```text
storage/app/security_observations.csv
```

The exported CSV can be processed by the Python analysis pipeline.

---

# 🧠 Research Methodology

```text
Literature Review
       ↓
Research Problem
       ↓
System Design
       ↓
Laravel + Reverb Setup
       ↓
Monitoring Layer
       ↓
Dataset Collection
       ↓
Feature Engineering
       ↓
Detection
       ↓
Risk Scoring
       ↓
Adaptive Defense
       ↓
Experimental Evaluation
       ↓
Research Conclusions
```

---

# ⚠️ Methodological Limitations

SocketShield is currently a research prototype.

## Reconnection Rate

The current reconnection-rate implementation is a prototype metric and should not be treated as a scientifically validated reconnection measurement.

Future work should distinguish:

```text
New Connection
```

from:

```text
Reconnection
```

using explicit session lifecycle tracking.

## Browser-Side Sampling

Current browser-side aggregation is event-driven and does not represent packet-level network monitoring.

## Active Connections

Stale connections may remain marked as connected if heartbeat/disconnect cleanup is incomplete.

A production implementation should add heartbeat timeout and stale-session cleanup.

## Risk Thresholds

The current risk thresholds are experimental starting points.

They should be validated using:

- Baseline observations
- Abnormal observations
- False-positive analysis
- False-negative analysis
- Precision
- Recall
- F1-score
- Resource impact

## Detection Scope

SocketShield focuses on application-layer behavioral monitoring and is not intended to replace network-level DDoS protection.

---

# 🔮 Future Enhancements

## Machine Learning

Potential models:

- Isolation Forest
- Random Forest
- One-Class SVM
- Gradient Boosting

Potential pipeline:

```text
Dataset
   ↓
Feature Engineering
   ↓
ML Model
   ↓
Prediction
   ↓
Risk Score
   ↓
Adaptive Defense
```

## Improved Session Tracking

Explicit lifecycle tracking for:

```text
Connection
Session
Reconnection
Disconnect
```

## Heartbeat Cleanup

Automatically expire stale connections.

## Redis Integration

Potential uses:

- High-speed counters
- Rate limiting
- Temporary risk state
- Distributed connection tracking
- Real-time metrics

## Real-Time Security Events

Future architecture:

```text
SecurityDecisionCreated
        ↓
      Reverb
        ↓
    Dashboard
        ↓
 Instant UI Update
```

## Historical Charts

Future dashboard charts:

```text
CPU vs Time
Memory vs Time
Messages/sec vs Time
Connections vs Time
Risk Score vs Time
Defense Actions vs Time
```

## Experiment Management UI

Potential features:

```text
Create Experiment
      ↓
Select Scenario
      ↓
Start
      ↓
Monitor
      ↓
Stop
      ↓
Export Dataset
      ↓
Analyze
```

## Docker

Future container architecture:

```text
Laravel
Reverb
Python API
Redis
Database
```

---

# 📌 Project Status

## Completed

- [x] Laravel application
- [x] SQLite database
- [x] Livewire integration
- [x] Authentication
- [x] Laravel Reverb
- [x] Laravel Echo
- [x] WebSocket event broadcasting
- [x] WebSocket connection monitoring
- [x] Traffic metric collection
- [x] Python resource monitoring
- [x] FastAPI resource API
- [x] Security observation collection
- [x] CSV dataset export
- [x] Feature engineering
- [x] Baseline analysis
- [x] Scenario comparison
- [x] Descriptive statistics
- [x] Rule-based detection
- [x] Statistical anomaly detection
- [x] Detector evaluation
- [x] Risk scoring
- [x] Security decision storage
- [x] Adaptive defense logic
- [x] Security dashboard
- [x] Controlled local experiment workflow

## Planned

- [ ] Improved reconnection tracking
- [ ] Heartbeat-based stale connection cleanup
- [ ] Historical charts
- [ ] Machine-learning detector
- [ ] Real-time security decision broadcasting
- [ ] Improved server-side traffic measurement
- [ ] Full no-defense vs static vs adaptive evaluation
- [ ] Detection latency measurement
- [ ] False-positive analysis
- [ ] False-negative analysis
- [ ] Final research evaluation

---

# 🧭 Research Roadmap

```text
Phase 1
WebSocket + Security Fundamentals
        ↓
Phase 2
Laravel Reverb Implementation
        ↓
Phase 3
Research Gap and Literature Survey
        ↓
Phase 4
Real-Time WebSocket Application
        ↓
Phase 5
Authentication and Authorization
        ↓
Phase 6
Redis Integration
        ↓
Phase 7
Connection Monitoring
        ↓
Phase 8
Message Monitoring
        ↓
Phase 9
Server Resource Monitoring
        ↓
Phase 10
Normal Traffic Dataset
        ↓
Phase 11
Controlled Abnormal Experiments
        ↓
Phase 12
Feature Analysis
        ↓
Phase 13
Rule-Based Detection
        ↓
Phase 14
Statistical Detection
        ↓
Phase 15
Machine Learning Detection
        ↓
Phase 16
Risk Scoring
        ↓
Phase 17
Adaptive Defense
        ↓
Phase 18
Final Evaluation
```

---

# 🔐 Ethical and Responsible Use

SocketShield is intended for:

- Academic research
- Security experimentation
- Defensive development
- Controlled laboratory testing
- WebSocket security education

Use only:

```text
Systems you own
```

or:

```text
Systems for which you have explicit authorization
```

The included traffic-generation examples are designed for local testing such as:

```text
127.0.0.1
```

Do **not** use the experimental traffic-generation mechanisms against public or third-party infrastructure.

---

# 🧪 Testing

Run Laravel tests:

```bash
php artisan test
```

Or Pest:

```bash
./vendor/bin/pest
```

Run Python components:

```bash
python python/analysis/feature_engineering.py
python python/detection/rule_detector.py
python python/detection/statistical_detector.py
python python/detection/risk_scorer.py
```

---

# 🐛 Troubleshooting

## Dashboard returns HTTP 500

Clear Laravel caches:

```bash
php artisan optimize:clear
```

Restart Laravel:

```bash
php artisan serve
```

## Dashboard returns 404 for `/resources`

The Laravel endpoint is:

```text
/monitor/resources
```

The Python endpoint is:

```text
http://127.0.0.1:9000/resources
```

## CPU shows 0%

Check:

```text
http://127.0.0.1:9000/resources
```

Then:

```text
http://127.0.0.1:8000/monitor/resources
```

Then:

```text
http://127.0.0.1:8000/dashboard/metrics
```

This identifies where telemetry is being lost.

## Dashboard shows `NaN`

Ensure frontend values are converted to valid numeric values before rendering and provide safe fallbacks for missing telemetry.

## Reverb is not connecting

Run:

```bash
php artisan reverb:start
```

Then inspect the browser console.

Expected:

```text
Reverb connected
```

Check the Reverb variables in `.env`.

## Risk remains zero

Check that `security_decisions` contains records.

Expected flow:

```text
WebSocket Message
       ↓
TrafficMetric
       ↓
RiskScoringService
       ↓
SecurityDecision
       ↓
Dashboard
```

---

# 📸 Recommended GitHub Screenshots

For the GitHub repository, include three screenshots in the README:

## 1. Normal Security State

Show:

```text
Risk: LOW
Detection: NORMAL
Defense: ALLOW
```

## 2. Abnormality Detection

Show:

```text
Detection: ANOMALY DETECTED
Risk: Increased
Violations: Increased
```

## 3. Adaptive Defense

Show an actual experimentally generated state such as:

```text
Defense: THROTTLE
```

or:

```text
Defense: RESTRICT
```

Only show a defense state when the backend actually produces it.

Suggested image organization:

```text
docs/
└── screenshots/
    ├── dashboard-normal.png
    ├── dashboard-anomaly.png
    └── dashboard-defense.png
```

Then add them to the README using:

```markdown
![Normal Dashboard](docs/screenshots/dashboard-normal.png)

![Anomaly Detection](docs/screenshots/dashboard-anomaly.png)

![Adaptive Defense](docs/screenshots/dashboard-defense.png)
```

---

# 📚 Research Contribution

The central research contribution of SocketShield is the investigation of a defense model that combines:

```text
WebSocket Behavioral Analysis
             +
Server Resource Monitoring
             +
Anomaly Detection
             +
Risk Scoring
             +
Adaptive Mitigation
```

Rather than relying exclusively on static traffic thresholds, SocketShield investigates whether combining:

```text
Traffic Behavior
+
Resource Pressure
+
Repeated Violations
```

can provide more context-aware defense decisions.

---

# 🧪 Expected Research Outcomes

The project aims to produce:

1. A working Laravel Reverb WebSocket security monitoring framework.
2. A dataset containing normal and controlled abnormal observations.
3. A rule-based detection model.
4. A statistical anomaly detector.
5. A risk-scoring mechanism.
6. An adaptive defense mechanism.
7. A security dashboard.
8. Comparative experimental results.
9. Performance measurements.
10. A research evaluation of resource-aware adaptive defense.

---

# 📜 License

This project is primarily an academic research prototype.

Before public distribution, add an appropriate open-source license such as MIT or Apache-2.0 and include the corresponding `LICENSE` file.

---

# 👨‍💻 Author

## Samuel Ebenezer

Academic Research Project

### Project

**SocketShield**

### Research Areas

- WebSocket Security
- Application-Layer DoS Detection
- Anomaly Detection
- Resource-Aware Security
- Adaptive Defense
- Laravel Reverb
- Security Monitoring

---

# ⭐ Project Summary

> **SocketShield is an adaptive, resource-aware WebSocket security research framework that combines application-level traffic behavior, server-resource telemetry, anomaly detection, risk scoring, and adaptive mitigation to investigate the detection and defense of application-layer DoS-like behavior in Laravel Reverb WebSocket networks.**

The overall system follows:

```text
        WebSocket Activity
                ↓
        Traffic Monitoring
                ↓
       Resource Monitoring
                ↓
        Feature Extraction
                ↓
      Anomaly Detection
                ↓
          Risk Scoring
                ↓
       Adaptive Defense
                ↓
      Security Visualization
```

---

<p align="center">

## 🛡️ SocketShield

### Observe. Detect. Assess. Adapt.

</p>
