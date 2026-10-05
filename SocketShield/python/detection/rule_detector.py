import pandas as pd

INPUT_FILE = "storage/app/security_observations.csv"
OUTPUT_FILE = "python/dataset/processed/rule_detection_results.csv"

df = pd.read_csv(INPUT_FILE)

thresholds = {
    "messages_per_second": 10,
    "bytes_per_second": 5000,
    "active_connections": 20,
    "cpu_usage": 80,
    "memory_usage": 80
}

weights = {
    "messages_per_second": 30,
    "bytes_per_second": 20,
    "active_connections": 20,
    "cpu_usage": 15,
    "memory_usage": 15
}

def calculate_risk(row):
    risk = 0
    violations = []

    for feature, threshold in thresholds.items():
        value = row[feature]

        if value > threshold:
            risk += weights[feature]
            violations.append(feature)

    return pd.Series([
        min(risk, 100),
        ",".join(violations)
    ])

df[["risk_score", "violated_features"]] = df.apply(
    calculate_risk,
    axis=1
)

df["classification"] = df["risk_score"].apply(
    lambda x: "suspicious" if x >= 30 else "normal"
)

df["recommended_action"] = df["risk_score"].apply(
    lambda x:
        "allow" if x <= 30
        else "monitor" if x <= 50
        else "throttle" if x <= 70
        else "block"
)

df.to_csv(OUTPUT_FILE, index=False)

print("\nRULE DETECTION RESULTS")
print(
    df[
        [
            "risk_score",
            "violated_features",
            "classification",
            "recommended_action"
        ]
    ].tail(20).to_string(index=False)
)

print(f"\nSaved: {OUTPUT_FILE}")