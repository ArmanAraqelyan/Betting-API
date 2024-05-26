# Betting API

The Betting API is a simple, secure API for processing bet requests from users. It ensures that the request comes from a valid user with sufficient balance and generates a secure random number to calculate the payout based on the user's bet.

## Setup

1. **Clone the Repository**:

    ```
    git clone https://github.com/BitslerCasino/bitsler-be-test.git
    ```

2. **Database and Project Setup**:

   Follow the instructions in INSTRUCTIONS.md.

## Usage

### Authentication

- Authentication is performed using a Bearer token in the `Authorization` header.
- Include the Bearer token in the `Authorization` header of your request.

### Endpoints

#### `/api.php`

- **POST /?action=place_bet**: Place a bet. Requires authentication.
    - Request Body:
        ```json
        {
            "bet_amount": 50
        }
        ```
    - Response:
        ```json
        {
            "bet_amount": 50,
            "generated_number": 7,
            "payout": 600,
            "new_balance": 650
        }
        ```

### Error Handling

- If authentication fails or the request is invalid, the API will respond with an appropriate error message.

## Additional Information

- The API is designed to be simple, secure, and efficient, following best practices for web development.
- TODO: Consider using DTOs (Data Transfer Objects) and Value Objects to improve data handling and encapsulation. Review the codebase for these TODO comments.
- TODO: Consider storing balance values as integers representing the smallest unit of currency (e.g., cents) to avoid precision issues in financial calculations.