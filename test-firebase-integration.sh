#!/bin/bash

# Test script to verify the Firebase integration is working
# This will test both Firebase and fallback mechanisms

echo "Testing Jewellery Position Controller Firebase Integration..."

# Test 1: Load positions (should work with local fallback)
echo -e "\n1. Testing load positions..."
curl -X GET "http://localhost:8000/api/jewellery/load-positions" \
  -H "Content-Type: application/json" \
  -w "\nHTTP Status: %{http_code}\n"

# Test 2: Save positions (should work with local fallback)
echo -e "\n2. Testing save positions..."
curl -X POST "http://localhost:8000/api/jewellery/save-positions" \
  -H "Content-Type: application/json" \
  -d '{
    "model_image": "bystate/test-image.png",
    "device_type": "desktop",
    "positions": {
      "earrings": {"x": 10, "y": 20},
      "necklace": {"x": 30, "y": 40}
    }
  }' \
  -w "\nHTTP Status: %{http_code}\n"

# Test 3: Load positions again to verify save worked
echo -e "\n3. Verifying save worked..."
curl -X GET "http://localhost:8000/api/jewellery/load-positions" \
  -H "Content-Type: application/json" \
  -w "\nHTTP Status: %{http_code}\n"

echo -e "\nTest complete!"
