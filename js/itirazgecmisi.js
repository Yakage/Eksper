"use strict";
(function () {
    let menuIsOpen = true;
    let switchBtn = document.querySelector(".switch");
    let switchIcon = document.querySelector(".switch > i");
    function openMenu() {
        document.querySelector(".fixed-menu").classList.add("active");
        switchIcon.setAttribute("class", "fa fa-times-circle");
        switchBtn.style = "";
        menuIsOpen = true;
    }
    function closeMenu() {
        document.querySelector(".fixed-menu").classList.remove("active");
        switchIcon.setAttribute("class", "fa fa-caret-right");
        switchBtn.style.left = "101%";
        switchBtn.style.fontSize = "2.5rem";
        switchBtn.style.color = "#46b04a";
        menuIsOpen = false;
    }

    function autoPlusNum(el, finalNum) {
        let target = document.querySelector(el);
        let time = 1000;
        let speed = 10;
        let count = 0;
        let initial = 0;
        let step = finalNum / (time / speed);
        let timer = setInterval(() => {
            count = count + step;
            if (count >= finalNum) {
                clearInterval(timer);
                count = finalNum;
            }
            let text = Math.floor(count);
            if (text === initial) return;
            initial = text;
            target.textContent = initial;
        }, 30);
    }

    function init() {
        setTimeout(() => {
            autoPlusNum(".photos", 100);
            autoPlusNum(".videos", 50);
            autoPlusNum(".connections", 200);
            autoPlusNum(".mixes", 5);
        }, 500);
        switchBtn.addEventListener("click", function () {
            menuIsOpen ? closeMenu() : openMenu();
        });
        window.addEventListener("resize", function () {
            let ww = window.innerWidth;
            let wh = window.innerHeight;
            let icon = document.querySelector(".music > .pic");
            ww >= 768 ? openMenu() : "";
            wh <= 740
                ? (icon.style.display = "none")
                : (icon.style.display = "block");
        });
    }
    init();
})();
