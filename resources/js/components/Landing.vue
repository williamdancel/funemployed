<template>
  <div class="landing-page">
    <!-- Simple header -->
    <header class="hero">
      <h1>💼 Funemployed.io</h1>
       <p class="tagline">A chill community for the funemployed <br> where jobless legends and overworked survivors <br> hang out, laugh, and build cool portfolios together.</p>
      <button @click="enterLounge" class="cta-button">→ Join the Lounge</button>
    </header>
  </div>
</template>

<script>
export default {
  name: 'LandingPage',
  methods: {
    enterLounge() {
      this.$router.push('/lounge');
    }
  }
}
</script>

<style src="../../css/Landing.css" scoped></style>