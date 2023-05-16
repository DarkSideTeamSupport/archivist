<script>
    document.querySelector('.createBtn').addEventListener('click', ()=> {
        document.querySelector('.form__overlay').classList.remove('hidden')
    })

    document.querySelector('.createForm__close').addEventListener('click', ()=> {
        document.querySelector('.form__overlay').classList.add('hidden')
    })
</script>
