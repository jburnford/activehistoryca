# Arbutus Cloud Resource Request - ActiveHistory.ca

**To:** cloud@tech.alliancecan.ca (or your local ARC support)

**Subject:** RAS Request for Persistent VM - ActiveHistory.ca Public History Website

---

Dear Alliance Cloud Team,

I am writing to request cloud resources to host ActiveHistory.ca, a public history website that has been running since 2011. We are currently hosted on commercial managed WordPress hosting (Kinsta) and would like to migrate to Arbutus to reduce costs and keep our infrastructure within the Canadian academic research ecosystem.

## About the Project

**ActiveHistory.ca** is a bilingual public history website connecting the work of historians with the broader public. The site features scholarly articles, digital exhibits, and educational resources about Canadian history. It operates as a WordPress multisite network with three sites:

- activehistory.ca (main site)
- activehistory.ca/exhibits/
- activehistory.ca/expositions/

## Current Technical Profile

| Component | Size/Version |
|-----------|--------------|
| Database | 694 MB (MySQL/MariaDB) |
| Files | 17 GB (primarily media uploads) |
| WordPress | 6.9 (multisite) |
| PHP | 8.2 |
| Traffic | ~20,000 visits/day (high for academic publishing) |

ActiveHistory.ca receives significant public engagement for an academic site, regularly reaching 20,000 daily visits (excluding bot traffic). Articles frequently circulate on social media and are cited in news coverage of historical topics, leading to occasional traffic spikes beyond baseline levels.

## Requested Resources

Given our traffic levels, we are requesting a **persistent VM** with the following specifications:

| Resource | Requested | Justification |
|----------|-----------|---------------|
| vCPUs | 4 | Handle concurrent PHP-FPM workers during traffic spikes |
| RAM | 16 GB | PHP workers, MariaDB buffers, Redis object cache |
| Storage | 100 GB | 17 GB current files + database + OS + backups + growth |
| Floating IP | 1 | Public web access |

## Planned Software Stack

- Ubuntu 22.04 LTS
- nginx (web server with FastCGI caching)
- PHP 8.2-FPM
- MariaDB (database)
- Redis (object caching for WordPress)
- Let's Encrypt (SSL certificates)
- Cloudflare (CDN/DDoS protection - free tier)
- Standard WordPress security hardening

The caching layers (nginx FastCGI cache, Redis object cache, Cloudflare CDN) will allow us to handle traffic spikes efficiently while keeping resource usage reasonable.

## Timeline

We would like to set up a test/staging environment first to validate the migration before switching production DNS. This allows us to ensure everything works correctly without disrupting the live site.

## Contact Information

[Your name]
[Your title/department]
[Your institution]
[Your email]
[Your Alliance CCDB username, if you have one]

Thank you for considering this request. Please let me know if you need any additional information.

Best regards,

[Your name]
