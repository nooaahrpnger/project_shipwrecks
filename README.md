# Shipwrecks API
## Project Overview

The Shipwrecks API provides a comprehensive platform for exploring detailed information about shipwrecks that occurred in the years 2020, 2021, and 2022. Users can search, add, update, and delete records through a simple and intuitive interface. This API is designed for historians, researchers, and anyone interested in maritime accidents, offering an in-depth look into the circumstances, locations, and details of each shipwreck.

## Features

- **Search Functionality**: Users can search for shipwrecks by year, location, name of the ship, and other relevant criteria.
- **Detailed Records**: Each shipwreck entry includes detailed information such as the date of the wreck, the ship's name, location (latitude and longitude), cause of the wreck, and any casualties.
- **CRUD Operations**: Users can create new shipwreck records, read existing information, update details, and delete records.
- **Responsive Design**: The website is designed to be user-friendly on a variety of devices, including desktops, tablets, and smartphones.
# Getting Started
## Prerequisites

- Any kind of Database

# Installation
1. Clone the repository:

- [GitHub] (https://github.com/nooaahrpnger/project_shipwrecks.git)

# Using the API

## Endpoints
- GET /shipwrecks: Retrieve all shipwreck records.
- GET /shipwrecks/:year: Retrieve shipwrecks by year (2020, 2021, or 2022).
- POST /shipwrecks: Create a new shipwreck record.
- DELETE /shipwrecks/:id: Delete a shipwreck record.

## Example Request

'GET /shipwrecks/2021'