let clicked = true
const toggle = () => {
  clicked = !clicked
  document.getElementById('button-text').style.transform = (clicked ? 'translateY(-20px)' : 'translateY(20px)')
  document.getElementById('title-text').style.transform = (clicked ? 'translateY(-94px)' : 'translateY(-12px)')
  document.getElementById('button').innerText = (clicked ? 'Sign Up' : 'Sign In')

  const hiddenItems = document.querySelectorAll('#signUp-only')
  for (var i = 0; i < hiddenItems.length; i++) {
    var item = hiddenItems[i]
    item.classList.add(clicked ? 'show-field' : 'hide-field')
    item.classList.remove(!clicked ? 'show-field' : 'hide-field')
  }
}