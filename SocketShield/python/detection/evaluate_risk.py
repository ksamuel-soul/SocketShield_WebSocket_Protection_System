import pandas as pd
from sklearn.metrics import classification_report, confusion_matrix

INPUT_FILE = "python/dataset/processed/risk_scoring_results.csv"

df = pd.read_csv(INPUT_FILE)

df = df[
    df["label"].isin(["normal", "abnormal"])
].copy()

actual = df["label"].map({
    "normal": "normal",
    "abnormal": "abnormal"
})

predicted = df["risk_level"].apply(
    lambda x: "normal"
    if x == "low"
    else "abnormal"
)

print("\nCONFUSION MATRIX")

print(
    confusion_matrix(
        actual,
        predicted,
        labels=["normal", "abnormal"]
    )
)

print("\nCLASSIFICATION REPORT")

print(
    classification_report(
        actual,
        predicted,
        labels=["normal", "abnormal"],
        zero_division=0
    )
)