#!/bin/bash

echo "========================================"
echo "Starting OCD Platform (All Services)"
echo "========================================"
echo ""
echo "This will start:"
echo "  1. Python AI Server (port 5000)"
echo "  2. Laravel Server (port 8000)"
echo ""
echo "Press Ctrl+C to stop all services"
echo ""

# Function to cleanup on exit
cleanup() {
    echo ""
    echo "Stopping all services..."
    kill $AI_PID $LARAVEL_PID 2>/dev/null
    exit 0
}

trap cleanup SIGINT SIGTERM

# Start AI Server
echo "Starting AI Server..."
cd ocmds
python3 app.py &
AI_PID=$!
cd ..
sleep 3

# Start Laravel
echo "Starting Laravel Server..."
php artisan serve &
LARAVEL_PID=$!
sleep 3

echo ""
echo "========================================"
echo "All services started!"
echo "========================================"
echo ""
echo "AI Server:     http://127.0.0.1:5000"
echo "Laravel:       http://127.0.0.1:8000"
echo "AI Detection:  http://127.0.0.1:8000/ai-detection"
echo ""
echo "Opening AI Detection page..."
echo ""

# Open browser (works on Mac and most Linux distros)
if command -v open &> /dev/null; then
    open http://127.0.0.1:8000/ai-detection
elif command -v xdg-open &> /dev/null; then
    xdg-open http://127.0.0.1:8000/ai-detection
fi

echo "Press Ctrl+C to stop all services"
echo ""

# Wait for processes
wait

