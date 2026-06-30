# Security Policy

## Supported Versions

| Version | Supported |
|---------|-----------|
| 0.1.x   | ✅        |

Older versions receive no security fixes. Always use the latest release.

## Reporting a Vulnerability

**Do not open a public issue for security vulnerabilities.**

Use GitHub's private vulnerability reporting:
👉 [Report a vulnerability](https://github.com/rokke-php/contracts/security/advisories/new)

You will receive a response within **72 hours**. If the vulnerability is confirmed, a patch will be released as soon as possible and you will be credited in the advisory.

## Scope

This package defines PHP interfaces and enums with no runtime behaviour of its own. Security issues most likely to apply:

- Type confusion or unsafe contracts that enable vulnerable implementations
- Dependencies with known CVEs (`psr/container`)

## Out of scope

- Vulnerabilities in implementations of these contracts (report to the relevant package)
- Issues requiring physical access or social engineering
