document.addEventListener("DOMContentLoaded", () => {
  // Mobile Menu Toggle
  const mobileMenuToggle = document.querySelector(".mobile-menu-toggle");
  const mainNav = document.querySelector(".main-nav");

  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener("click", () => {
      mobileMenuToggle.classList.toggle("active");

      if (mainNav) {
        if (mainNav.style.display === "flex") {
          mainNav.style.display = "none";
        } else {
          mainNav.style.display = "flex";
        }
      }
    });
  }

  // Accordion for FAQ
  const accordionItems = document.querySelectorAll(".accordion-item");

  accordionItems.forEach((item) => {
    const header = item.querySelector(".accordion-header");

    if (header) {
      header.addEventListener("click", () => {
        // Close all other accordion items
        accordionItems.forEach((otherItem) => {
          if (otherItem !== item) {
            otherItem.classList.remove("active");
          }
        });

        // Toggle current item
        item.classList.toggle("active");
      });
    }
  });

  // Scroll to Top Button
  const scrollTopButton = document.querySelector(".scroll-top");

  if (scrollTopButton) {
    // Initially hide the button
    scrollTopButton.style.display = "none";

    // Show/hide the button based on scroll position
    window.addEventListener("scroll", () => {
      if (window.scrollY > 500) {
        scrollTopButton.style.display = "flex";
      } else {
        scrollTopButton.style.display = "none";
      }
    });

    // Scroll to top when clicked
    scrollTopButton.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  }

  // Form Validation
  // const contactForm = document.getElementById("contact-form");

  // if (contactForm) {
  //   contactForm.addEventListener("submit", (e) => {
  //     e.preventDefault();

  //     const formFields = contactForm.querySelectorAll("input, textarea");
  //     let isValid = true;

  //     formFields.forEach((field) => {
  //       if (field.hasAttribute("required") && !field.value.trim()) {
  //         isValid = false;
  //         field.classList.add("error");

  //         field.addEventListener("input", () => {
  //           if (field.value.trim()) {
  //             field.classList.remove("error");
  //           } else {
  //             field.classList.add("error");
  //           }
  //         });
  //       }
  //     });

  //     if (isValid) {
  //       // Simulating form submission
  //       const submitButton = contactForm.querySelector('button[type="submit"]');

  //       if (submitButton) {
  //         const originalText = submitButton.textContent;
  //         submitButton.textContent = "Đang gửi...";
  //         submitButton.disabled = true;

  //         // Simulate API call delay
  //         setTimeout(() => {
  //           // Reset form after successful submission
  //           contactForm.reset();

  //           // Show success message
  //           alert("Cảm ơn bạn đã gửi tin nhắn! Chúng tôi sẽ liên hệ lại với bạn sớm nhất có thể.");

  //           // Reset button
  //           submitButton.textContent = originalText;
  //           submitButton.disabled = false;
  //         }, 1500);
  //       }
  //     }
  //   });
  // }

  // Animation on Scroll
  function animateOnScroll() {
    const elements = document.querySelectorAll(".service-card, .pricing-card, .advantage-item, .about-content, .about-image");

    elements.forEach((element) => {
      const elementPosition = element.getBoundingClientRect().top;
      const screenHeight = window.innerHeight;

      if (elementPosition < screenHeight - 100) {
        element.classList.add("appear");
      }
    });
  }

  // Add appear class to elements
  window.addEventListener("scroll", animateOnScroll);
  // Run once on load
  animateOnScroll();

  // Add style for form validation
  const style = document.createElement("style");
  style.textContent = `
      .error {
          border-color: #ff4d4d !important;
          box-shadow: 0 0 0 2px rgba(255, 77, 77, 0.2) !important;
      }

      .appear {
          animation: fadeInUp 0.6s ease-out forwards;
      }

      @keyframes fadeInUp {
          from {
              opacity: 0;
              transform: translateY(30px);
          }
          to {
              opacity: 1;
              transform: translateY(0);
          }
      }
  `;
  document.head.appendChild(style);
});
