import pandas as pd
import numpy as np

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

normal = df[df["label"] == "normal"]
abnormal = df[df["label"] == "abnormal"]

results = []

for feature in features:
    normal_mean = normal[feature].mean()
    abnormal_mean = abnormal[feature].mean()

    if normal_mean != 0:
        change_percent = (
            (abnormal_mean - normal_mean)
            / abs(normal_mean)
        ) * 100
    else:
        change_percent = np.nan

    results.append({
        "feature": feature,
        "normal_mean": normal_mean,
        "abnormal_mean": abnormal_mean,
        "change_percent": change_percent
    })

result_df = pd.DataFrame(results)

result_df["absolute_change_percent"] = (
    result_df["change_percent"].abs()
)

result_df = result_df.sort_values(
    "absolute_change_percent",
    ascending=False
)

print("\nFEATURE SEPARATION")
print(result_df.to_string(index=False))

OUTPUT_FILE = "python/dataset/processed/feature_comparison.csv"

result_df.to_csv(
    OUTPUT_FILE,
    index=False
)

print(f"\nSaved: {OUTPUT_FILE}")