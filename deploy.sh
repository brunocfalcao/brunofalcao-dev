#!/bin/bash

# Step 1
echo "Step 1: Renaming composer.json to composer.local.json"
mv composer.json composer.local.json
if [ $? -ne 0 ]; then
    echo "An error occurred, exiting."
    exit 1
fi

# Wait
sleep 2

# Step 2
echo "Step 2: Renaming composer.forge.json to composer.json"
mv composer.forge.json composer.json
if [ $? -ne 0 ]; then
    echo "An error occurred, exiting."
    exit 1
fi

# Wait
sleep 2

# Step 3
echo "Step 3: Running composer update"
composer update
if [ $? -ne 0 ]; then
    echo "An error occurred, exiting."
    exit 1
fi

# Wait
sleep 2

# Step 4
echo "Step 4: Committing and pushing to remote repo"
git add -A
git commit -m "forge deploy"
git push
if [ $? -ne 0 ]; then
    echo "An error occurred, exiting."
    exit 1
fi

# Wait
sleep 2

# Step 5
echo "Step 5: Renaming composer.json to composer.forge.json"
mv composer.json composer.forge.json
if [ $? -ne 0 ]; then
    echo "An error occurred, exiting."
    exit 1
fi

# Wait
sleep 2

# Step 6
echo "Step 6: Renaming composer.local.json to composer.json"
mv composer.local.json composer.json
if [ $? -ne 0 ]; then
    echo "An error occurred, exiting."
    exit 1
fi

# Wait
sleep 2

# Step 7
echo "Step 7: Running another composer update"
composer update
if [ $? -ne 0 ]; then
    echo "An error occurred, exiting."
    exit 1
fi

# Done
echo "All steps completed successfully."
exit 0
