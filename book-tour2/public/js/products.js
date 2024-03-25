
const searchForm = document.querySelector(".search-form");


const searchIcon = document.querySelector(".fa-search");


searchIcon.addEventListener("click", toggleSearchForm);

document.querySelector("#search-btn").onclick = () => {
    searchForm.classList.toggle("active");
};


function toggleSearchForm(event) {
    event.preventDefault();
    searchForm.classList.toggle("active");
}

function submitSearchForm() {
    document.getElementById("searchForm").submit();
}

function toggleDropdown(event) {
    event.preventDefault();
    var dropdownContent = event.target.nextElementSibling;
    dropdownContent.style.display === "block" ? dropdownContent.style.display = "none" : dropdownContent.style.display = "block";
}
//swiper functioning
window.onscroll = () => {
    searchForm.classList.remove("active");

    if (window.scrollY > 93) {
        document.querySelector(".header .header-2").classList.add("active");
    } else {
        document.querySelector(".header .header-2").classList.remove("active");
    }
};

window.onload = () => {
    if (window.scrollY > 80) {
        document.querySelector(".header .header-2").classList.add("active");
    } else {
        document.querySelector(".header .header-2").classList.remove("active");
    }

    fadeOut();
};

function loader() {
    document.querySelector(".loader-container").classList.add("active");
}

function fadeOut() {
    setTimeout(loader, 4000);
}

//swiper functioning for new arrivals
var swiper = new Swiper(".arrivals-slider", {
    spaceBetween: 10,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 9500,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

//swiper functioning for best sellers
var swiper = new Swiper(".bestsellers-slider", {
    spaceBetween: 10,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 9500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        450: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
        },
    },
});
