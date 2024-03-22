import React, { useState, useEffect } from "react";
import axios from "axios";
import { Line } from "react-chartjs-2";
import Chart from "chart.js/auto";

export default function LineChartComponent({ isLightMode }) {
    const [chartData, setChartData] = useState({
        labels: [],
        datasets: [],
    });
    const token = localStorage.getItem("token");

    useEffect(() => {
        axios
            .get("/api/admin/users-growth", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => {
                const growthData = response.data;
                const labels = growthData.map((data) => data.month);
                const data = growthData.map((data) => data.count);

                setChartData({
                    labels: labels,
                    datasets: [
                        {
                            label: "Users Gained",
                            data: data,
                            fill: false,
                            backgroundColor: isLightMode
                                ? "#106586"
                                : "#a5f3fc",
                            borderColor: isLightMode ? "#106586" : "#a5f3fc",
                        },
                    ],
                });
            })
            .catch((error) => {
                console.error(
                    "There was an error fetching the user growth data: ",
                    error,
                );
            });
    }, [isLightMode, token]);

    const options = {
        scales: {
            x: {
                ticks: {
                    color: isLightMode ? "black" : "white",
                },
                grid: {
                    color: "rgba(255, 255, 255, 0.1)",
                },
            },
            y: {
                ticks: {
                    color: isLightMode ? "black" : "white",
                },
                grid: {
                    color: "rgba(255, 255, 255, 0.1)",
                },
            },
        },
        plugins: {
            legend: {
                labels: {
                    color: isLightMode ? "black" : "white",
                },
            },
        },
    };

    return <Line data={chartData} options={options} />;
}
