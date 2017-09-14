#!/bin/bash

cd pimf-framework/ && \
git fetch --tags && \
git checkout v1.11.0 && \
cd .. && \
git add pimf-framework/ && \
git commit -m "moved submodule to v1.11.0"
