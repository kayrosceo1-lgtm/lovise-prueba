---
name: deploy
description: Deploy theme and plugins to EasyPanel WordPress staging via GitHub
---

# Deploy

Deploy the generated theme and plugins to EasyPanel staging.

## When to Use
When the user says `/deploy` or wants to push the site to staging.

## Prerequisites
- `.env` file with `EASYPANEL_DEPLOY_WEBHOOK` configured
- Git repo initialized and connected to GitHub
- EasyPanel WordPress instance running

## Steps

### 1. Validate Before Deploy
- Run theme validation (valid theme.json, required templates exist)
- Check for uncommitted changes
- Check that `.env` is not being tracked by git

### 2. Commit Changes
If there are uncommitted changes:
- Stage theme and plugin files
- Create a descriptive commit message
- Do NOT commit `.env`, `node_modules/`, or database files

### 3. Push to GitHub
```bash
git push origin main
```

### 4. Trigger EasyPanel Deploy
Two options:

**Option A: Deploy Webhook (simplest for V1)**
```bash
curl -s -X POST "$EASYPANEL_DEPLOY_WEBHOOK"
```
EasyPanel auto-deploys when it receives the webhook.

**Option B: GitHub Actions (automated)**
The workflow in `.github/workflows/deploy.yml` handles this automatically on push to main.

### 5. Verify Deployment
- Tell the user to check the staging URL
- Remind them to flush permalinks if needed (Settings > Permalinks > Save)
- Check that the theme is active

## What Gets Deployed
- `theme/` -> `/var/www/html/wp-content/themes/{theme-slug}/`
- `plugins/` -> `/var/www/html/wp-content/plugins/`

## What Does NOT Get Deployed
- `briefs/` - internal only
- `design/` - internal only
- `docs/` - internal only
- `playground/` - local only
- `.env` - secrets
- Database - managed by EasyPanel
- Uploads - managed by WordPress

## EasyPanel Setup Notes
The user needs to set up EasyPanel once:
1. Install WordPress via EasyPanel template
2. Configure the domain and SSL
3. Either:
   a. Point EasyPanel to the GitHub repo for auto-deploy
   b. Set up a deploy webhook and use it from GitHub Actions
4. Ensure volumes persist for `wp-content/uploads` and the database
