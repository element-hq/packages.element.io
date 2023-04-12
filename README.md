This repository owns the packages.element.io site. The site runs on a public Cloudflare R2 bucket.

To trigger generating new index.html pages send a repository dispatch with type `packages-index`.
To add a deb package to the controlled repository, upload it to `packages-element-io-incoming` bucket,
and send a repository dispatch with type `reprepro-incoming` and include the name of the file in `incoming` within the payload.
