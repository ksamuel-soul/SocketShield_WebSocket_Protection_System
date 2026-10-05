import pandas as pd

INPUT_FILE = "python/dataset/processed/security_features.csv"

df = pd.read_csv(INPUT_FILE)

numeric_columns = [
    "active_connections",
    "messages_per_second",
    "message_size",
    "cpu_usage",
    "memory_usage",
    "network_bytes_sent",
    "network_bytes_received",
    "network_total",
    "connection_density",
    "message_load",
    "resource_pressure",
    "network_rate"
]

existing_columns = [
    column for column in numeric_columns
    if column in df.columns
]

stats = df[existing_columns].describe().T

stats["range"] = stats["max"] - stats["min"]

print("\n===== SOCKETSHIELD BASELINE =====\n")

print(
    stats[
        [
            "count",
            "mean",
            "std",
            "min",
            "25%",
            "50%",
            "75%",
            "max",
            "range"
        ]
    ].round(3)
)

print("\n===== NORMAL BEHAVIOR PROFILE =====\n")

for column in existing_columns:
    print(
        f"{column}: "
        f"mean={df[column].mean():.3f}, "
        f"std={df[column].std():.3f}, "
        f"min={df[column].min():.3f}, "
        f"max={df[column].max():.3f}"
    )