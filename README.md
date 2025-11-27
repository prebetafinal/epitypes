# Epitypes

Semantic file classification for content management systems.

## Problem 🤖
File systems organize by technical format (.jpg, .pdf, .mp3). Humans organize by purpose and meaning. This creates a classification gap in content management systems.

## Solution
Epitypes (epistemological types) bridge this gap using a three-level hierarchy:

**Nature** - fundamental behavior
- **Folders** - native file system directories 
- **Pages** - files you edit (markdown, code, data, config)  
- **Assets** - files you consume (media, documents, archives, materials)
- **Ignore** - system files to skip (.DS_Store, .git, etc.)

**Type** - semantic grouping (raw, markup, media, documents)

**Format** - specific implementation (html, image, pdf)

## Structure (abbreviated for clarity)

```json
{
  "pages": { 
    "description": "Editable content files that can be opened in text editors",
    "types": {
      "raw": ["txt", "text", "log"],     
      "markup": ["html", "md", "xml"],    
      "code": ["js", "py", "php"],        
      "data": ["json", "yaml", "csv"],    
      "config": ["ini", "env", "conf"]    
    }
  },
  "assets": { 
    "description": "Files for consumption, reference, or use as materials",
      "types": {
        "media": ["jpg", "mp3", "mp4"],     
        "documents": ["pdf", "docx"],       
        "archives": ["zip", "tar", "7z"],   
        "materials": ["psd", "3ds", "midi"]  
      } 
  },
  "ignored": {
    "description": "Items to ignore during file scanning",
    "items": [".git", ".DS_Store", "Thumbs.db", ".svn", ".hg", ".epitome", ".gitignore", "node_modules", ".vscode", ".idea"]
  }
}
```

## Epistemic Foundation 🤓
**Layer 1 (Nature/Ontological)**: `pages` vs `assets` 
- Pure human conceptual distinction: "What I work on" vs "What I consume"
- Domain-Driven Design level - reflects user mental models
- Never changes because it's fundamental to human cognition

**Layer 2 (Type/Categorical)**: `raw`, `markup`, `code`, `data`, `config`
- Human-computer bridge layer - how humans categorize information processing
- Reflects both human logic (raw text vs structured) and computational needs
- Stable because these are fundamental information categories

**Layer 3 (Format/Technical)**: `markdown`, `javascript`, `json`, etc.
- Pure technical implementation details
- Machine-readable yet human-understandable
- Most volatile layer - formats come and go

Each level and node  tends to be linguistically sound:
- **Raw** = unstructured human thought
- **Markup** = structured human expression  
- **Code** = human instructions for machines
- **Data** = structured information
- **Config** = system parameters

This creates an epistemic hierarchy: pure human cognition → hybrid human-machine categories → technical specifications. 

## Notes 📜
The 'page' term works perfectly as long as it's presented as a page in the UI, regardless of its deeper nature, and this is something widely accepted in the domain.
An asset seems natural without any explanation as the opposite of page in given context.

This classification is not final so any input/feedback is welcome.

### Unknown Files

Files not listed in epitypes automatically fall into an "other" group. Things like executables (.exe), system binaries, and other irrelevant to content management formats. These cases should be handled by algorithms accordingly. 

## License


MIT

