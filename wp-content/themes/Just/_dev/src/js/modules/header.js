export default class HeaderMenu {
  constructor() {
    this.menuContainer = document.querySelector('.site-header__container');
    this.menuGroup = document.querySelector('.site-header__container-menu-group');
    this.fasIcons = document.querySelectorAll('.fas');
    this.isIndex = false;
    this.hamburgers = document.querySelectorAll('.hamburger');
    this.hamburgersContainer = document.querySelector('.site-header__hamburger');

    if (this.fasIcons.length > 0) {
      this.fasIcons.forEach(icon => {
        icon.addEventListener('click', (e) => {
          this.fasIcons.forEach( e => {
            e.classList.toggle('off');
          })
          this.showMenu();
        })
      })
    } else if (this.hamburgers) {
      this.hamburgers.forEach(hamburger => {
        this.hamburgersContainer.addEventListener('click', (e) => {
          hamburger.classList.toggle('open');
          // this.hamburgers.forEach( e => {
          //   e.classList.toggle('open');
          // })
          this.showMenu();
        })
      })
    }
  }

  showMenu() {
    if (this.isIndex) {
        this.menuContainer.style = "";
        this.isIndex = !this.isIndex
    } else {
      this.menuContainer.style.zIndex = "2";
      this.isIndex = !this.isIndex
    }
    this.menuGroup.classList.toggle('menu-opened');
  }
}


document.addEventListener('DOMContentLoaded', () => {
  new HeaderMenu();
});