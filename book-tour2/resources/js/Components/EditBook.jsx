"use client";

import { Modal } from "flowbite-react";
import { useRef, useState } from "react";
import { IconButton } from "rsuite";
import { HiOutlinePencilAlt } from "react-icons/hi";
import axios from "axios";

export default function EditBookButton({ bookObj }) {
    const imgfile = bookObj.file;
    const [newFile, setNewFile] = useState(null);
    const [openModal, setOpenModal] = useState(false);
    const [inputErrorList, setInputErrorList] = useState({});
    const [book, setBook] = useState({
        title: bookObj.Title,
        author: bookObj.Author,
        genre: bookObj.Genre,
        price: bookObj.Price,
        stock: bookObj.Stock,
        id: bookObj.Book_ID,
    });

    const handleInput = (e) => {
        setBook({ ...book, [e.target.name]: e.target.value });
    };

    const handleFileChange = (e) => {
        if (e.target.files[0]) {
            setNewFile(e.target.files[0]);
        }
    };

    const bookTitleRef = useRef(null);

    const saveBook = async (e) => {
        e.preventDefault();
        const formData = new FormData();
        Object.keys(book).forEach((key) => formData.append(key, book[key]));
        const imageInput = document.querySelector("#image");
        if (newFile) {
            formData.append("image", file);
        }
        axios
            .put(`http://127.0.0.1:8000/api/updatebook/${book.id}`, formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
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

    return (
        <>
            <IconButton
                icon={<HiOutlinePencilAlt />}
                onClick={() => setOpenModal(true)}
            ></IconButton>
            <Modal
                show={openModal}
                className="text-black"
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
                                id="addBookForm"
                                encType="multipart/form-data"
                            >
                                <div className={formrow}>
                                    <div className="mb-2 block dark:text-white">
                                        <label
                                            htmlFor="title"
                                            className="form-label"
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
                                    <div className="mb-2 block dark:text-white">
                                        <label
                                            htmlFor="author"
                                            className="form-label"
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
                                    <div className="mb-2 block dark:text-white">
                                        <label
                                            htmlFor="genre"
                                            className="form-label"
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
                                    <div className="mb-2 block dark:text-white">
                                        <label
                                            htmlFor="price"
                                            className="form-label"
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
                                    <div className="mb-2 block dark:text-white">
                                        <label
                                            htmlFor="stock"
                                            className="form-label"
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
                                        onChange={handleFileChange}
                                        accept="image/*"
                                    />
                                </div>
                                <div className="w-full flex flex-row">
                                    <button
                                        type="submit"
                                        id="submit"
                                        className="btn text-white border border-solid flex-1 bg-green-500"
                                    >
                                        Confirm Changes
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
