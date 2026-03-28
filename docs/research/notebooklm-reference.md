# NotebookLM Reference

## Key Notebook
- **ID:** 94965256-bbca-48d5-80f7-8c6d0a8388dd
- **Title:** Architecting the Semi-Automated WordPress Factory
- **Sources:** 4 documents
- **Last updated:** 2026-03-28

## How to Query
```bash
PYTHONIOENCODING=utf-8 nlm notebook query "94965256-bbca-48d5-80f7-8c6d0a8388dd" "your question here"
```

## Key Decisions Documented in NotebookLM

1. **Block Themes are the only scalable route for AI automation** - Page builders store designs as opaque database blobs that AI cannot reason about
2. **Stitch design.md solves the "design system amnesia" problem** - It captures the full visual ecosystem in a machine-readable format
3. **Automattic/agent-skills prevents AI hallucination** - Forces modern WordPress coding patterns instead of deprecated PHP
4. **WordPress Playground for ephemeral previews** - Eliminates staging server friction
5. **"Code in Git, State in DB" rule** - Never version-control databases or uploads
6. **Target automation: 50-65%** - Factory is a capacity multiplier, not a human replacement
7. **Human QA is mandatory** - AI code may have sanitization issues, accessibility gaps

## Related Notebooks
- WordPress MCP Adapter and Block Theme Development Guide (9383dd49)
- Guía de Gestión Empresarial (35aa5fa1)
