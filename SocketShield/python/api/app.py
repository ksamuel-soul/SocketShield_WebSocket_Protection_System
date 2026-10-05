from fastapi import FastAPI
import psutil

app = FastAPI(title="SocketShield Resource Monitor")

@app.get("/health")
def health():
    return {
        "status": "ok",
        "service": "SocketShield Resource Monitor"
    }

@app.get("/resources")
def resources():
    memory = psutil.virtual_memory()
    network = psutil.net_io_counters()

    cpu = psutil.cpu_percent(interval=1.0)

    return {
        "cpu_usage": round(cpu, 2),
        "memory_usage": round(memory.percent, 2),
        "memory_used": memory.used,
        "memory_total": memory.total,
        "network_bytes_sent": network.bytes_sent,
        "network_bytes_received": network.bytes_recv
    }