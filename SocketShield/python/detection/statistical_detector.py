import pandas as pd
import numpy as np

INPUT_FILE = "storage/app/security_observations.csv"
OUTPUT_FILE = "python/dataset/processed/statistical_detection_results.csv"

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

baseline = df[df["label"] == "normal"].copy()

thresholds = {}

for feature in features:
    mean = baseline[feature].mean()
    std = baseline[feature].std()

    thresholds[feature] = mean + (3 * std)

print("\nSTATISTICAL THRESHOLDS")

for feature, threshold in thresholds.items():
    print(f"{feature}: {threshold:.4f}")

def detect(row):
    violations = []

    for feature in features:
        if row[feature] > thresholds[feature]:
            violations.append(feature)

    if violations:
        return pd.Series([
            "anomaly",
            ",".join(violations)
        ])

    return pd.Series([
        "normal",
        ""
    ])

df[["statistical_classification", "violated_features"]] = df.apply(
    detect,
    axis=1
)

df.to_csv(
    OUTPUT_FILE,
    index=False
)

print("\nSTATISTICAL DETECTION RESULTS")

print(
    df["statistical_classification"]
    .value_counts()
)

print(f"\nSaved: {OUTPUT_FILE}")