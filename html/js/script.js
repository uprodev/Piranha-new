// lenis
const lenis = new Lenis({
  lerp: 0.3,
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

lenis.on("scroll", ScrollTrigger.update);




gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

// animate home main title
var tlH1 = gsap.timeline({
  repeat: -1,
});
var tlH2 = gsap.timeline({
  repeat: -1,
});
tlH1
  .to(
    ".title-animated span span:first-child",
    {
      y: "-1em",
      duration: 1,
      ease: "power2.in",
    },
    "+=2"
  )
  .to(
    ".title-animated span span:first-child",
    {
      y: 0,
      duration: 1,
      ease: "power2.in",
    },
    "+=2"
  );

tlH2
  .to(
    ".title-animated span span:last-child",
    {
      y: "-1em",
      duration: 1,
      ease: "power2.in",
    },
    "+=2"
  )
  .to(
    ".title-animated span span:last-child",
    {
      y: "-2em",
      duration: 1,
      ease: "power2.in",
    },
    "+=2"
  );

// navbar
document.querySelectorAll(".navbar-toggler").forEach((toggler) => {
  toggler.addEventListener("click", function () {
    if (document.querySelector(".header-navbar").classList.contains("active")) {
      document.querySelector(".header").classList.remove("nav-opened");
      document.querySelector("html").classList.remove("is-menu");
      document.querySelector(".header-navbar").classList.remove("active");
    } else {
      document.querySelector(".header-navbar").classList.add("active");
      document.querySelector(".header").classList.add("nav-opened");
      document.querySelector("html").classList.add("is-menu");
    }
  });
});

// languages
if (document.querySelector(".lang-switcher")) {
  document.querySelector(".lang-switcher button").addEventListener("click", function (e) {
    e.stopPropagation();
    this.closest(".lang-switcher").classList.toggle("active");
  });
  document.querySelectorAll(".lang-switcher ul a").forEach((el) => {
    el.addEventListener("click", function (e) {
      e.stopPropagation();
      // e.preventDefault();
      var text = this.innerText;
      this.closest(".lang-switcher").querySelector("button").innerText = text;
      this.closest(".lang-switcher").classList.remove("active");
    });
  });
  document.addEventListener("click", function () {
    document.querySelector(".lang-switcher").classList.remove("active");
  });
}

//animate home page
if (document.querySelector(".home-banner")) {
  const animatedColorChars = SplitType.create(".animated-color", { types: "words, chars" });
  const start = window.innerHeight - 125;


  lenis.on("scroll", function () {
    if (lenis.actualScroll < start) {
      document.querySelector(".header").classList.add("header-light");
    }
  });

  gsap.to(".home-section-1", {
    scrollTrigger: {
      trigger: ".home-section-1",
      scrub: true,
      start: "top " + start,
      end: "top top",
    },
    width: "100%",
    onComplete: function () {
      document.querySelector(".header").classList.remove("header-light");
    },
  });

  gsap.to(".home-section-1", {
    scrollTrigger: {
      trigger: ".home-section-1",
      scrub: true,
      start: "top bottom",
      end: () => `+=125`,
    },
    opacity: 1,
  });

}

// fade in блоков
document.querySelectorAll(".fade-in, .fade-in-wrapper > *").forEach((el) => {
  gsap.to(el, {
    scrollTrigger: {
      trigger: el,
      start: "top 80%",
    },
    y: 0,
    opacity: 1,
    duration: 1,
    ease: "power.easeIn",
  });
});

jQuery(document).ready(function ($) {
  //mask tel
  $('.tel').mask('+380 999-99-99', {placeholder: "+380 000-00-00"});

  //add class header
  $(window).scroll(function () {
    if($(this).scrollTop() > 200) {
      $('header').addClass('header-shadow')
    } else {
      $('header').removeClass('header-shadow')
    }
  });

  //cutt text
  $('.news .item a p').dotdotdot({
    height: 75
  });
  //cutt text
  $('.news-block .title-item').dotdotdot({
    height: 75
  });
  //cutt text
  $('.news-block .item .text').dotdotdot({
    height: 75
  });


});