<template>
    <div class="header" id="header">
        <div class="container">
            <h2>Welcome to Jamiicare</h2>
            <p>
                Jamiicare is a health service provider that helps you to connect with qualified doctors
            </p>
            <b>
                For un-paralleled health services, we got you.
            </b> <br> <br>
            <button class="btn-clear btn btn-lg btn-default">Explore Our Services</button>
        </div>
    </div>
</template>

<script>
    export default {}
</script>

<style lang="sass">
    .header
        padding: 70px 0 60px
        height: 500px
        width: 100%
        margin-top: 0
        background-image: url("../../../../storage/app/public/images/background/heaven.jpg")
        background-position: center center
        background-repeat: no-repeat
        background-size: cover
        text-align: center

        .btn-clear
            background-color: transparent !important
            border: 2px solid #0099cc


    .header h2
        font-family: 'Noto Sans', sans-serif
        font-size: 75px

    .header p
        font-family: 'Lato', sans-serif
        font-size: 35px
        text-align: center
</style>