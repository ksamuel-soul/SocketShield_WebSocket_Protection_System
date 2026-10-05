import pandas as pd

rule_file = "python/dataset/processed/rule_detection_results.csv"
stat_file = "python/dataset/processed/statistical_detection_results.csv"

rule_df = pd.read_csv(rule_file)
stat_df = pd.read_csv(stat_file)

rule_df = rule_df[
    rule_df["label"].isin(["normal", "abnormal"])
].copy()

stat_df = stat_df[
    stat_df["label"].isin(["normal", "abnormal"])
].copy()

print("\nRULE-BASED DETECTOR")
print(
    rule_df["classification"].value_counts()
)

print("\nSTATISTICAL DETECTOR")
print(
    stat_df["statistical_classification"].value_counts()
)