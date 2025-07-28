# Magento 2 - Dad Jokes Module

This is a simple Magento 2 module that fetches dad jokes from the [icanhazdadjoke.com](https://icanhazdadjoke.com/) API, stores them in the database, and displays them in the Magento admin and on the frontend.

## Features

*   Fetches dad jokes from an external API.
*   Admin grid to view, delete, and fetch new jokes.
*   Displays a random dad joke on the frontend.
*   ACL for admin actions.

## Installation

> **Note:** This module is designed for demonstration purposes and does not require Composer.

Follow these steps to install the module:

1.  **Download/Clone the module**
    If you have a zip file, extract it. You should have a `Daz` directory.

2.  **Copy files to your Magento instance**
    Copy the `Daz` directory into the `app/code/` directory of your Magento 2 installation.
    The final path should be `app/code/Daz/DadJoke`.

3.  **Enable the module and run setup scripts**
    Open your terminal, navigate to your Magento root directory, and run the following commands in order:

    ```bash
    # Enable the module
    php bin/magento module:enable Daz_DadJoke

    # Run database schema updates
    php bin/magento setup:upgrade

    # Compile the code
    php bin/magento setup:di:compile

    # Deploy static content
    php bin/magento setup:static-content:deploy -f
    
    # Clean the cache
    php bin/magento cache:clean
    ```

4.  **Verify Installation**
    *   Log in to your Magento Admin.
    *   Navigate to **Content > Dad Jokes**. You should see the Dad Jokes grid.
    *   Click the "Fetch New Joke" button to populate the grid with jokes from the API.
    *   Visit your store's frontend. A random dad joke should be displayed (usually near the top of the content area).

## Usage

### Admin

*   **Viewing Jokes**: Go to **Content > Dad Jokes**.
*   **Fetching a New Joke**: On the Dad Jokes grid page, click the "Fetch New Joke" button.
*   **Deleting Jokes**: Select jokes from the grid and use the "Delete" mass action.

### Frontend

A random joke from your saved collection will be displayed on frontend pages. The location can be changed by editing the layout file `app/code/Daz/DadJoke/view/frontend/layout/default.xml`.

## Uninstallation

1.  **Disable the module**
    ```bash
    php bin/magento module:disable Daz_DadJoke --clear-static-content
    ```

2.  **Run setup scripts**
    ```bash
    php bin/magento setup:upgrade
    ```

3.  **(Optional) Remove module files**
    ```bash
    rm -rf app/code/Daz/DadJoke
    ```

    php bin/magento cache:clean
    