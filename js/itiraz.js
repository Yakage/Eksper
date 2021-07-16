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

class DropDown {
  
  constructor(options) {
    
    this.selects = options.selects;
    this.selects.forEach((item, i, selects) => {
      item.addEventListener('mousedown', this.showMenu.bind(this));
    });

    this.lists = options.lists;
    this.lists.forEach((item, i, selects) => {
      item.addEventListener('click', this.chooseItem.bind(this));
    });

    this.button = options.button;
    this.button.addEventListener('click', this.submit.bind(this));

    document.addEventListener('click', this.hideMenu.bind(this));
    window.addEventListener('load', this.renderItems.bind(this));
  }
  
  showMenu(e) {

    e.preventDefault();
    const currentItem = e.target;
    let list = currentItem.closest('.select-wrap').querySelector('.select-list');

    if (list.classList.contains('hide')) {
      this.selects.forEach((item, i, selects) => {
        item.classList.remove('active');
        item.closest('.select-wrap').querySelector('.select-list').classList.add('hide');
      });

      list.classList.remove('hide');
      currentItem.classList.add('active');
      
    } else {
      
      list.classList.add('hide');
      currentItem.classList.remove('active');
      
    }

  }
  hideMenu(e) {

      let target = e.target;

      if (target.tagName !== 'SELECT' && !target.classList.contains('select-list__item')) {
        this.selects.forEach((item, i, selects) => {
          item.classList.remove('active');
          item.closest('.select-wrap').querySelector('.select-list').classList.add('hide');
        });
      }
      return;

  }
  renderItems() {

    const select1 = this.selects[0];
    const options = select1.querySelectorAll('option');
    const list = select1.closest('.select-wrap').querySelector('.select-list');
    
    let tempList = [];

    options.forEach((item) => {

      let li = document.createElement('LI');
      li.className = 'select-list__item';
      li.textContent = item.value;
      list.appendChild(li);
    });

  }
  chooseItem(e) {

    let target = e.target;
    if (!target.classList.contains('select-list__item')) return;

    let choosenItem = target.textContent;
    let select = target.closest('.select-wrap').querySelector('select');
    select.value = choosenItem;

    target.closest('.select-list').classList.add('hide');
    select.classList.remove('active');

    if (target.closest('.select-wrap').querySelector('select').id === 'select-1') {
      let options = [];
      let lis = [];
      
      
      let xhr = new XMLHttpRequest();
      xhr.open('GET', 'https://api.myjson.com/bins/1ewjc');
      xhr.send();
      
      xhr.onreadystatechange = function() { // (3)
      if (xhr.readyState != 4) return;

      if (xhr.status != 200) {
        console.log(xhr.status + ': ' + xhr.statusText);
      } else {
        let data = JSON.parse(xhr.responseText);
        let category = data[target.textContent.toLowerCase()];

        let select = document.querySelector('#select-2');
        let list = select.closest('.select-wrap').querySelector('.select-list');

        select.innerHTML = '';
        list.innerHTML = '';

        category.forEach((item) => {

          

          let option = document.createElement('option');
          option.value = item;
          option.textContent = item;
          select.appendChild(option);

          let li = document.createElement('li');
          li.className = 'select-list__item';
          li.textContent = item;
          list.appendChild(li);

        })
      }

    }
    }

  }

  submit(e) {

    e.preventDefault();
    document.querySelector('.order__select-1').textContent = `1) ${this.selects[0].value}`;
    document.querySelector('.order__select-2').textContent = `2) ${this.selects[1].value}`;

  }
}

let dropDown = new DropDown({
  lists: document.querySelectorAll('.select-list'),
  selects: document.querySelectorAll('select'),
  button: document.getElementById('button')
});