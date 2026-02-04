
import os
import zipfile

def zip_project(source_dir, output_filename):
    # Files/Folders to EXCLUDE
    excludes = {
        'node_modules', '.git', '.gemini', '.vscode', '.idea', 'dist',
        'tests', 'storage/framework/cache', 'storage/framework/views',
        'deploy_script.py', 'deployment_package.zip', 'stuvalley_deploy.zip',
        '.env', '.env.production'
    }
    
    # Extensions to exclude
    exclude_exts = {'.log', '.tmp', '.zip'}

    with zipfile.ZipFile(output_filename, 'w', zipfile.ZIP_DEFLATED) as zipf:
        for root, dirs, files in os.walk(source_dir):
            # Get relative path from source, normalized to forward slashes
            rel_root = os.path.relpath(root, source_dir).replace('\\', '/')
            
            # Skip if this directory or any parent is in excludes
            if any(rel_root.startswith(ex) or rel_root == ex for ex in excludes if ex != '.'):
                dirs[:] = [] # Don't go deeper
                continue

            # Also modify dirs in-place for next steps
            dirs[:] = [d for d in dirs if (rel_root + '/' + d if rel_root != "." else d) not in excludes]
            
            for file in files:
                file_path = os.path.join(root, file)
                arcname = os.path.relpath(file_path, source_dir).replace('\\', '/')
                
                # Check if file itself or its extension should be excluded
                if arcname in excludes or any(file.endswith(ext) for ext in exclude_exts):
                    continue
                     
                # Add to zip
                print(f"Adding: {arcname}")
                zipf.write(file_path, arcname)

if __name__ == "__main__":
    source = r"c:\xampp\htdocs\stuvalley.com-main\stuvalley.com-main"
    output = os.path.join(source, "stuvalley_deploy.zip")
    print("Creating deployment zip...")
    zip_project(source, output)
    print(f"Done! Created {output}")
