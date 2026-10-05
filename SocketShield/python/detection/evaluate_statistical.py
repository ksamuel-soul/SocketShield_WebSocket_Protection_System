import pandas as pd
from sklearn.metrics import classification_report, confusion_matrix, accuracy_score

INPUT_FILE = "python/dataset/processed/statistical_detection_results.csv"

df = pd.read_csv(INPUT_FILE)

df = df[df["label"].isin(["normal", "abnormal"])].copy()

actual = df["label"].map({
    "normal": "normal",
    "abnormal": "anomaly"
})

predicted = df["statistical_classification"]

valid = actual.notna() & predicted.notna()

actual = actual[valid]
predicted = predicted[valid]

print("\nEVALUATION DATA")
print(f"Total labeled observations: {len(actual)}")

print("\nACTUAL LABELS")
print(actual.value_counts())

print("\nPREDICTED LABELS")
print(predicted.value_counts())

print("\nCONFUSION MATRIX")

cm = confusion_matrix(
    actual,
    predicted,
    labels=["normal", "anomaly"]
)

print(cm)

print("\nCLASSIFICATION REPORT")

print(
    classification_report(
        actual,
        predicted,
        labels=["normal", "anomaly"],
        zero_division=0
    )
)

print("\nACCURACY")

print(
    accuracy_score(
        actual,
        predicted
    )
)