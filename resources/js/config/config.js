export const config = {
	headers: {
		"Accept": "application/json",
	 	"Authorization": `Bearer ${localStorage.getItem('user_api_token')}` 
	}
}