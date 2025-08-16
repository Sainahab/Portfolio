// //Navigation Bar Effects On Scroll
// window.addEventListener("scroll", function(){
//     const header = document.querySelector("header");

// });    

// //Services Section - Modal
// const serviceModals = document.querySelectorAll(".service-modal");
// const learnmoreBtns = document.querySelectorAll(".learn-more-btn");
// const modalCloseBtns = document.querySelectorAll(".modal-close-btn");

// var modal = function(modalClick){
//     serviceModals[modalClick].classList.add("active");
// }

// learnmoreBtns.forEach((learnmoreBtn, i) => {
//     learnmoreBtn.addEventListener("click", () => {
//         modal(i);
//     });
// });

// modalCloseBtns.forEach((modalCloseBtn) => {
//     modalCloseBtn.addEventListener("click", () => {
//         serviceModals.forEach((modalView) => {
//             modalView.classList.remove("active");
//         });
//     });
// });




// //Our Client - swiper

// var swiper = new Swiper(".client-swiper", {
//     slidesPerView: 1,
//     spaceBetween: 30,
//     loop: true,
//     pagination: {
//       el: ".swiper-pagination",
//       clickable: true,
//     },
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     },
//   });


// //Website dark/light theme
// const themeBtn = document.querySelector(".theme-btn");

// themeBtn.addEventListener("click", () => {
//     document.body.classList.toggle("dark-theme");
//     themeBtn.classList.toggle("sun");

//     localStorage.setItem("saved-theme", getCurrentTheme());
//     localStorage.setItem("saved-icon", getCurrentIcon());
// });

// const getCurrentTheme = () => document.body.classList.contains("dark-theme") ? "dark" : "light";
// const getCurrentIcon = () => themeBtn.classList.contains("sun") ? "sun" : "moon";

// const savedTheme = localStorage.getItem("saved-theme");
// const savedIcon = localStorage.getItem("saved-icon");

// if(savedTheme){
//     document.body.classList[savedTheme === "dark" ? "add" : "remove"]("dark-theme");
//     themeBtn.classList[savedIcon === "sun" ? "add" : "remove"]("sun");
// }

// //Scroll To Top Button
// const scrollToTopBtn = document.querySelector(".scrollToTop-btn");

// window.addEventListener("scroll", function(){
//     scrollToTopBtn.classList.toggle("active", window.scrollY > 500)
// });

// scrollToTopBtn.addEventListener("click", () => {
//     document.body.scrollTop = 0;
//     document.documentElement.scrollTop = 0;
// });

// //Navigation menu items active on page scroll
// window.addEventListener("scroll", () => {
//     const sections = document.querySelectorAll("section");
//     const scrollY = window.pageYOffset;

//     sections.forEach(current => {
//         let sectionHeight = current.offsetHeight;
//         let sectionTop = current.offsetTop - 50;
//         let id = current.getAttribute("id");

//         if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
//             document.querySelector(".nav-items a[href*=" + id + "]").classList.add("active");
//         }
//         else{
//             document.querySelector(".nav-items a[href*=" + id + "]").classList.remove("active");
//         }
//     });
// });
// // Responsive navigation menu toggle
// const menuBtn = document.querySelector(".nav-menu-btn");
// const closeBtn = document.querySelector(".nav-close-btn");
// const navigation = document.querySelector(".navigation");

// menuBtn.addEventListener("click", () => {
//     navigation.classList.add("active");
// });

// closeBtn.addEventListener("click", () => {
//     navigation.classList.remove("active");
// });

// // Close the menu when clicking on any menu item
// const menuItems = document.querySelectorAll(".navigation a");

// menuItems.forEach((item) => {
//     item.addEventListener("click", () => {
//         navigation.classList.remove("active");
//     });
// });

// // Close the menu when clicking outside of it
// document.addEventListener("click", (event) => {
//     if (!navigation.contains(event.target) && event.target !== menuBtn) {
//         navigation.classList.remove("active");
//     }
// });
//Navigation Bar Effects On Scroll
window.addEventListener("scroll", function(){
    const header = document.querySelector("header");

});    

//Services Section - Modal
const serviceModals = document.querySelectorAll(".service-modal");
const learnmoreBtns = document.querySelectorAll(".learn-more-btn");
const modalCloseBtns = document.querySelectorAll(".modal-close-btn");

var modal = function(modalClick){
    serviceModals[modalClick].classList.add("active");
}

learnmoreBtns.forEach((learnmoreBtn, i) => {
    learnmoreBtn.addEventListener("click", () => {
        modal(i);
    });
});

modalCloseBtns.forEach((modalCloseBtn) => {
    modalCloseBtn.addEventListener("click", () => {
        serviceModals.forEach((modalView) => {
            modalView.classList.remove("active");
        });
    });
});




//Our Client - swiper

var swiper = new Swiper(".client-swiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


//Website dark/light theme
const themeBtn = document.querySelector(".theme-btn");

themeBtn.addEventListener("click", () => {
    document.body.classList.toggle("dark-theme");
    themeBtn.classList.toggle("sun");

    localStorage.setItem("saved-theme", getCurrentTheme());
    localStorage.setItem("saved-icon", getCurrentIcon());
});

const getCurrentTheme = () => document.body.classList.contains("dark-theme") ? "dark" : "light";
const getCurrentIcon = () => themeBtn.classList.contains("sun") ? "sun" : "moon";

const savedTheme = localStorage.getItem("saved-theme");
const savedIcon = localStorage.getItem("saved-icon");

if(savedTheme){
    document.body.classList[savedTheme === "dark" ? "add" : "remove"]("dark-theme");
    themeBtn.classList[savedIcon === "sun" ? "add" : "remove"]("sun");
}

//Scroll To Top Button
const scrollToTopBtn = document.querySelector(".scrollToTop-btn");

window.addEventListener("scroll", function(){
    scrollToTopBtn.classList.toggle("active", window.scrollY > 500)
});


// Portfolio Filtering Logic - INTEGRATED WITH ISOTOPE
document.addEventListener("DOMContentLoaded", () => {
    const mainFilters = document.querySelectorAll("#portfolio-flters li");
    const subFiltersContainer = document.getElementById("portfolio-sub-flters");
    const subFilters = subFiltersContainer ? subFiltersContainer.querySelectorAll("li") : [];
    const portfolioContainer = document.querySelector(".portfolio-container");
    const webFilterLi = document.querySelector("#portfolio-flters li[data-filter=\".filter-web\"]");
    let portfolioIsotope = null; // Initialize Isotope instance variable

    if (portfolioContainer) {
        // Initialize Isotope
        portfolioIsotope = new Isotope(portfolioContainer, {
            itemSelector: ".portfolio-item",
            layoutMode: "fitRows" // Or your preferred layout mode
        });

        // --- Main Filter Logic --- 
// --- Main Filter Logic --- 
mainFilters.forEach(filter => {
    filter.addEventListener("click", function(e) {
        e.preventDefault();
        const filterValue = this.getAttribute("data-filter");
        let effectiveFilterValue = filterValue;

        // 1. Update active state
        mainFilters.forEach(f => f.classList.remove("filter-active"));
        this.classList.add("filter-active");

        // 2. Manage Sub-filter Visibility
        if (subFiltersContainer) {
            // Show only sub-filters for selected parent
            const matchingSubFilters = Array.from(subFilters)
                .filter(sf => sf.dataset.parent === filterValue);

            if (matchingSubFilters.length > 0) {
                subFiltersContainer.style.display = "block";

                // Hide unrelated sub-filters
                subFilters.forEach(sf => {
                    sf.style.display = (sf.dataset.parent === filterValue) ? "inline-block" : "none";
                    sf.classList.remove("filter-active");
                });

                // If there was an active sub-filter for this parent, use it
                const activeSubFilter = matchingSubFilters.find(sf => sf.classList.contains("filter-active"));
                if (activeSubFilter) {
                    effectiveFilterValue = filterValue + activeSubFilter.getAttribute("data-filter");
                }

            } else {
                subFiltersContainer.style.display = "none";
                subFilters.forEach(sf => sf.classList.remove("filter-active"));
            }
        }

        // 3. Filter Portfolio Items
        if (portfolioIsotope) {
            portfolioIsotope.arrange({ filter: effectiveFilterValue });
            portfolioIsotope.on("arrangeComplete", () => { try { AOS.refresh(); } catch(e) {} });
        }
    });
});

// --- Sub-Filter Logic --- 
if (subFiltersContainer) {
    subFilters.forEach(subFilter => {
        subFilter.addEventListener("click", function(event) {
            event.preventDefault();
            event.stopPropagation(); 
            const parentFilter = this.dataset.parent;
            const subFilterValue = this.getAttribute("data-filter");
            const combinedFilterValue = parentFilter + subFilterValue;

            // 1. Update active states
            subFilters.forEach(sf => sf.classList.remove("filter-active"));
            this.classList.add("filter-active");
            mainFilters.forEach(f => f.classList.remove("filter-active"));
            const parentLi = document.querySelector(`#portfolio-flters li[data-filter="${parentFilter}"]`);
            if (parentLi) parentLi.classList.add("filter-active");

            // 2. Filter items
            if (portfolioIsotope) {
                portfolioIsotope.arrange({ filter: combinedFilterValue });
                portfolioIsotope.on("arrangeComplete", () => { try { AOS.refresh(); } catch(e) {} });
            }
        });
    });
}


        // Trigger click on "All" filter initially
        const initialFilter = document.querySelector("#portfolio-flters li[data-filter=\"*\"]");
        if (initialFilter) {
            initialFilter.click();
        }

    } else {
        console.error("Portfolio container not found for Isotope initialization.");
    }
});

scrollToTopBtn.addEventListener("click", () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});

//Navigation menu items active on page scroll
window.addEventListener("scroll", () => {
    const sections = document.querySelectorAll("section");
    const scrollY = window.pageYOffset;

    sections.forEach(current => {
        let sectionHeight = current.offsetHeight;
        let sectionTop = current.offsetTop - 50;
        let id = current.getAttribute("id");

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector(".nav-items a[href*=" + id + "]").classList.add("active");
        }
        else{
            document.querySelector(".nav-items a[href*=" + id + "]").classList.remove("active");
        }
    });
});
// Responsive navigation menu toggle
const menuBtn = document.querySelector(".nav-menu-btn");
const closeBtn = document.querySelector(".nav-close-btn");
const navigation = document.querySelector(".navigation");

menuBtn.addEventListener("click", () => {
    navigation.classList.add("active");
});

closeBtn.addEventListener("click", () => {
    navigation.classList.remove("active");
});

// Close the menu when clicking on any menu item
const menuItems = document.querySelectorAll(".navigation a");

menuItems.forEach((item) => {
    item.addEventListener("click", () => {
        navigation.classList.remove("active");
    });
});

// Close the menu when clicking outside of it
document.addEventListener("click", (event) => {
    if (!navigation.contains(event.target) && event.target !== menuBtn) {
        navigation.classList.remove("active");
    }
});
