import React, { useState } from "react";
import axios from "axios";
import ReactDOM from "react-dom";

function OtherSide() {
    return (
        <div className="border border-solid border-2 rounded-2xl w-max hidden sm:block sm:flex sm:flex-col sm:items-center sm:justify-center sm:w-[300px] md:w-[400px] lg:w-[500px] bg-cyan-700">
            <div className="text-3xl p-8 text-white flex justify-center items-center">
                Welcome Back!
            </div>
            <div>Don't have an account?</div>
            <button className="bg-green-500 p-4">
                <a className="text-white" href="/admin">
                    <h2>Register Here</h2>
                </a>
            </button>
        </div>
    );
}

export default function LoginMain() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post("/api/user/login", {
                email,
                password,
            });
            const token = response.data.token;
            localStorage.setItem("usertoken", token);
            console.log("Login successful", response.data);
            window.location.href = "/products";
        } catch (error) {
            if (error.response) {
                console.error("Login error", error.response.data);
                alert("Incorrect Login Details");
            } else if (error.request) {
                console.error("Login error", error.request);
            } else {
                console.error("Error", error.message);
            }
        }
    };
    return (
        <div className="flex font-bold flex-col sm:flex-row rounded-2xl inset-20 shadow-[rgba(0,0,15,0.5)_10px_5px_4px_0px]">
            <OtherSide />

            <form
                onSubmit={handleSubmit}
                className=" bg-slate-800 rounded-2xl w-[300px] sm:w-[300px] md:w-[400px] lg:w-[500px] border border-solid border-2  flex max-w-2xl flex-col gap-4 lg:gap-8 text-black"
            >
                <div className="p-8 sm:p-10 md:p-12 lg:p-16 text-3xl text-white flex flex-col justify-center items-center">
                    <img
                        className="w-40 h-40"
                        src="/images/logotr.png"
                        alt="Book-tour logo"
                    />
                    <span className="flex flex-col justify-center items-center">
                        <h1>BookTour:</h1>
                        <span className="text-xs"></span>
                    </span>
                </div>
                <div className="p-8 flex flex-col justify-center">
                    <div className="mb-2 block text-white">
                        <label htmlFor="email1" className="form-label">
                            Your email
                        </label>
                    </div>
                    <input
                        id="email1"
                        type="email"
                        className="form-input"
                        placeholder="name@email.com"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                        required
                    />
                </div>
                <div className="pb-8 px-8 flex flex-col justify-center">
                    <div className="mb-2 block text-white">
                        <label htmlFor="password1" className="form-label">
                            Your password
                        </label>
                    </div>
                    <input
                        id="password1"
                        type="password"
                        className="form-input"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        required
                    />
                </div>
                <div className="flex items-center justify-center gap-2">
                    <input
                        id="remember"
                        type="checkbox"
                        className="form-checkbox"
                    />
                    <label htmlFor="remember" className="text-white form-label">
                        Remember me
                    </label>
                </div>
                <div className="flex items-center justify-center  p-2 sm:p-4 md:p-6 lg:p-8">
                    <button
                        type="submit"
                        className="w-max bg-[#b2cdd8] rounded-lg text-black border border-solid p-2 submit-button"
                    >
                        Submit
                    </button>
                </div>
            </form>
            <div className="sm:hidden border border-2 rounded-2xl">
                <div className="p-8 text-white bg-cyan-700 border rounded-2xl flex flex-col justify-center items-center">
                    <h1 className="text-3xl">Welcome Back!</h1>
                    <div>Don't have an account?</div>
                    <button className="bg-green-500 p-4">
                        <a className="text-white" href="/admin">
                            <h2>Register Here</h2>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    );
}

ReactDOM.render(<LoginMain />, document.getElementById("loginmain"));
