import pandas as pd

INPUT_FILE = "python/dataset/processed/security_features.csv"

df = pd.read_csv(INPUT_FILE)

features = [
    "active_connections",
    "messages_per_second",
    "message_size",
    "cpu_usage",
    "memory_usage",
    "network_rate",
    "message_load",
    "resource_pressure"
]

print("\n===== SOCKETSHIELD THRESHOLDS =====\n")

thresholds = {}

for feature in features:
    mean = df[feature].mean()
    std = df[feature].std()

    upper = mean + (3 * std)

    thresholds[feature] = upper

    print(
        f"{feature}: "
        f"mean={mean:.3f}, "
        f"std={std:.3f}, "
        f"upper_threshold={upper:.3f}"
    )