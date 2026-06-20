#!/bin/python3
from pathlib import Path

# Define the directory and the extension you want to find
directory_path = Path(".")
extension = "*.preproc.css"

# Find all matching files recursively
files = list(directory_path.rglob(extension))

# Print the paths
for file in files:
    print(file)
