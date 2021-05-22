
	</section>
	<script>
		const menuToggle = document.querySelector('.toggle');
		const navigation = document.querySelector('.navigation');
		menuToggle.onclick = function(){
			menuToggle.classList.toggle('active')
			navigation.classList.toggle('active')
		}

		const currectLocation = location.href;
		const menuItem = document.querySelectorAll('header ul li a');
		const menuLength = menuItem.length
		for (let i = 0; i < menuLength; i++){
			if (menuItem[i].href === currectLocation) {
				menuItem[i].className = 'active'
			}
		}
	</script>
	<script type="text/javascript" src="CSS/bootstrap.bundle.min.js"></script>
</body>
</html>