# TechShop (Docker)

## Run locally

1. Install Docker Desktop and make sure it is running.
2. Copy `.env.example` to `.env` and set local passwords.
3. From this folder, run `docker compose up --build`.
4. Open <http://localhost:8080/customer/>.
5. Stop with Ctrl+C. Run `docker compose down` to stop and remove containers; the database volume remains. `docker compose down -v` also deletes the local database contents.

The app uses the Compose service name `db` to reach MySQL. On first startup the web container creates the tables and inserts the sample data from `database/data.php`. The MySQL data lives in the `mysql_data` named volume.

Do not commit `.env`; it is ignored by Git. Before publishing this student demo publicly, review the sample accounts in `database/data.php` because the sample passwords are stored as plain text.
