"use client";

import { FileInput, Button, Label, Modal, TextInput } from "flowbite-react";
import { useRef, useState } from "react";
import { IconButton } from "rsuite";
import { HiOutlinePlus } from "react-icons/hi";
import axios from "axios";

export default function AddBookButton() {
    const token = localStorage.getItem("token");
    const [openModal, setOpenModal] = useState(false);
    const [inputErrorList, setInputErrorList] = useState({});
    const [book, setBook] = useState({
        title: "",
        author: "",
        genre: "",
        price: "",
        stock: "",
    });

    const handleInput = (e) => {
        e.persist();
        setBook({ ...book, [e.target.name]: e.target.value });
    };
    const bookTitleRef = useRef(null);

    const saveBook = async (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append("title", book.title);
        formData.append("author", book.author);
        formData.append("genre", book.genre);
        formData.append("price", book.price);
        formData.append("stock", book.stock);
        const imageInput = document.querySelector("#image");
        if (imageInput.files[0]) {
            formData.append("image", imageInput.files[0]);
        }
        axios
            .post(`/api/addbook`, formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(() => {
                window.location.href = "/admin/products";
            })
            .catch(function (error) {
                if (error.response) {
                    if (error.response === 422) {
                        setInputErrorList(error.response.data.errors);
                    } else {
                        console.error("An error occured", error);
                    }
                }
            });
    };

    const formrow = "flex flex-col justify-center";

    const forminput = "form-input text-black";

    const timeout = () => {
        setTimeout((window.location.href = "/admin/products"), 10000);
    };
    return (
        <>
            <Button className="bg-green-500" onClick={() => setOpenModal(true)}>
                Add New Book +
            </Button>
            <Modal
                show={openModal}
                className=""
                size="md"
                onClose={() => setOpenModal(false)}
                initialFocus={bookTitleRef}
                popup
            >
                <Modal.Header />
                <Modal.Body>
                    {
                        <div className="space-y-6">
                            <h3 className="text-xl font-medium text-gray-900 dark:text-white">
                                Book Details
                            </h3>
                            <form
                                onSubmit={saveBook}
                                action="/api/addbook"
                                method="post"
                                id="addBookForm"
                                encType="multipart/form-data"
                            >
                                <div className={formrow}>
                                    <div className="mb-2 block">
                                        <label
                                            htmlFor="title"
                                            className="form-label dark:text-white"
                                        >
                                            Book Title
                                        </label>
                                    </div>
                                    <input
                                        type="text"
                                        id="title"
                                        name="title"
                                        ref={bookTitleRef}
                                        className={forminput}
                                        placeholder="Title"
                                        value={book.title}
                                        onChange={handleInput}
                                        required
                                    />
                                    <span>{inputErrorList.title}</span>
                                </div>
                                <div className={formrow}>
                                    <div className="mb-2 block">
                                        <label
                                            htmlFor="author"
                                            className="form-label dark:text-white"
                                        >
                                            Author
                                        </label>
                                    </div>
                                    <input
                                        type="text"
                                        id="author"
                                        name="author"
                                        className={forminput}
                                        placeholder="Author"
                                        value={book.author}
                                        onChange={handleInput}
                                        required
                                    />
                                    <span>{inputErrorList.author}</span>
                                </div>
                                <div className={formrow}>
                                    <div className="mb-2 block">
                                        <label
                                            htmlFor="genre"
                                            className="form-label dark:text-white"
                                        >
                                            Genre
                                        </label>
                                    </div>
                                    <input
                                        type="text"
                                        id="genre"
                                        name="genre"
                                        className={forminput}
                                        placeholder="Genre"
                                        value={book.genre}
                                        onChange={handleInput}
                                        required
                                    />
                                    <span>{inputErrorList.genre}</span>
                                </div>
                                <div className={formrow}>
                                    <div className="mb-2 block">
                                        <label
                                            htmlFor="price"
                                            className="form-label dark:text-white"
                                        >
                                            Price
                                        </label>
                                    </div>
                                    <input
                                        type="number"
                                        id="price"
                                        name="price"
                                        className={forminput}
                                        placeholder="Price per Book"
                                        value={book.price}
                                        onChange={handleInput}
                                        required
                                    />
                                    <span>{inputErrorList.price}</span>
                                </div>
                                <div className={formrow}>
                                    <div className="mb-2 block">
                                        <label
                                            htmlFor="stock"
                                            className="form-label dark:text-white"
                                        >
                                            Stock
                                        </label>
                                    </div>
                                    <input
                                        type="number"
                                        id="stock"
                                        name="stock"
                                        className={forminput}
                                        placeholder="Stock Amount"
                                        value={book.stock}
                                        onChange={handleInput}
                                        required
                                    />
                                    <span>{inputErrorList.stock}</span>
                                </div>
                                <div className="form-group dark:text-white">
                                    <label htmlFor="image">Upload Image</label>
                                    <input
                                        type="file"
                                        id="image"
                                        name="image"
                                        onChange={handleInput}
                                        accept="image/*"
                                        required
                                    />
                                </div>
                                <div className="w-full flex flex-row">
                                    <button
                                        type="submit"
                                        id="submit"
                                        className="btn text-white border border-solid flex-1 bg-green-500"
                                    >
                                        Add Book
                                    </button>
                                    <button
                                        type="button"
                                        className="btn text-white border border-solid p-2 bg-red-500"
                                        onClick={() => setOpenModal(false)}
                                    >
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    }
                </Modal.Body>
            </Modal>
        </>
    );
}
