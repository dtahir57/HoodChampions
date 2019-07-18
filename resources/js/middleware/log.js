export default function log({ next, store }) {
	if (store.getters.api_token) {
		return next({
			name: 'Explore'
		});
	}

  return next();
}