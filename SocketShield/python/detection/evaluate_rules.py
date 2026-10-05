import pandas as pd
from sklearn.metrics import classification_report, confusion_matrix, accuracy_score

INPUT_FILE = "python/dataset/processed/rule_detection_results.csv"

df = pd.read_csv(INPUT_FILE)

df = df[df["label"].isin(["normal", "abnormal"])].copy()

actual = df["label"].map({
    "normal": "normal",
    "abnormal": "suspicious"
})

predicted = df["classification"].where(
    df["classification"].isin(["normal", "suspicious"])
)

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
    labels=["normal", "suspicious"]
)

print(cm)

print("\nCLASSIFICATION REPORT")

print(
    classification_report(
        actual,
        predicted,
        labels=["normal", "suspicious"],
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