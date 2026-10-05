import pandas as pd

INPUT_FILE = "python/dataset/processed/statistical_detection_results.csv"
OUTPUT_FILE = "python/dataset/processed/risk_scoring_results.csv"

df = pd.read_csv(INPUT_FILE)

def risk_score(row):
    score = 0

    if row["statistical_classification"] == "anomaly":
        score += 40

    violations = str(row["violated_features"])

    if "messages_per_second" in violations:
        score += 15

    if "bytes_per_second" in violations:
        score += 10

    if "active_connections" in violations:
        score += 10

    if "connection_rate" in violations:
        score += 10

    if "reconnection_rate" in violations:
        score += 5

    if "cpu_usage" in violations:
        score += 5

    if "memory_usage" in violations:
        score += 5

    return min(score, 100)

df["risk_score"] = df.apply(
    risk_score,
    axis=1
)

def risk_level(score):
    if score <= 30:
        return "low"

    if score <= 50:
        return "moderate"

    if score <= 70:
        return "high"

    if score <= 85:
        return "very_high"

    return "critical"

def action(score):
    if score <= 30:
        return "allow"

    if score <= 50:
        return "monitor"

    if score <= 70:
        return "throttle"

    if score <= 85:
        return "restrict"

    return "terminate"

df["risk_level"] = df["risk_score"].apply(
    risk_level
)

df["recommended_action"] = df["risk_score"].apply(
    action
)

df.to_csv(
    OUTPUT_FILE,
    index=False
)

print("\nRISK LEVEL DISTRIBUTION")
print(
    df["risk_level"].value_counts()
)

print("\nRECOMMENDED ACTIONS")
print(
    df["recommended_action"].value_counts()
)

print("\nRISK SCORE STATISTICS")
print(
    df["risk_score"].describe()
)

print(f"\nSaved: {OUTPUT_FILE}")