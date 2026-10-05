import pandas as pd
import numpy as np

INPUT_FILE = "storage/app/security_observations.csv"
OUTPUT_FILE = "python/dataset/processed/security_features.csv"

df = pd.read_csv(INPUT_FILE)

df["collected_at"] = pd.to_datetime(df["collected_at"])

df["network_total"] = (
    df["network_bytes_sent"] +
    df["network_bytes_received"]
)

df["connection_density"] = (
    df["active_connections"] /
    df["messages_per_second"].replace(0, np.nan)
).fillna(0)

df["message_load"] = (
    df["messages_per_second"] *
    df["message_size"]
)

df["resource_pressure"] = (
    df["cpu_usage"] +
    df["memory_usage"]
) / 2

df["network_rate"] = (
    df["network_total"].diff().fillna(0)
)

df = df.replace([np.inf, -np.inf], np.nan)
df = df.fillna(0)

df.to_csv(OUTPUT_FILE, index=False)

print("Feature engineering completed.")
print(f"Rows: {len(df)}")
print(f"Columns: {len(df.columns)}")
print(f"Output: {OUTPUT_FILE}")