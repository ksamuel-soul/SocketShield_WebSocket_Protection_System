import psutil

cpu = psutil.cpu_percent(interval=1)
memory = psutil.virtual_memory()
network = psutil.net_io_counters()

print("CPU Usage:", cpu, "%")
print("Memory Usage:", memory.percent, "%")
print("Memory Used:", round(memory.used / (1024 ** 3), 2), "GB")
print("Network Sent:", network.bytes_sent)
print("Network Received:", network.bytes_recv)