export default function auth({ next, router }) {
	if(!this.$store.getters.apiToken) {
		return this.$router.push('/Login');
	}
  return next();
}