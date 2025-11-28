# Filament v4 Form Grid Standards

## Objectives
- Consistent spacing and alignment across components
- Responsive behavior on all screen sizes
- Clear visual hierarchy and vertical rhythm
- Accessibility-first labels and focus states
- Consistent validation and error messaging

## Grid & Columns
- Use `Section::make(...)->columns(['sm' => 1, 'md' => 2])` for most sections.
- For dense layouts, prefer `['sm' => 1, 'md' => 2, 'xl' => 3]`.
- Long text (`Textarea`, `KeyValue`) should `columnSpan(['sm' => 1, 'md' => 2])` or `columnSpanFull()`.
- Ensure related fields share the same section for alignment.

## Spacing & Rhythm
- Rely on Filament defaults; sections create natural `gap` between fields.
- Use multiple sections to create logical vertical rhythm (Content, Status, Dates, etc.).

## Responsiveness
- Always specify responsive `columns` arrays (`sm`, `md`, optional `xl`).
- Avoid hard-coding large `columnSpan` values that break small screens.

## Accessibility
- Every field must have a `->label(...)` and meaningful text.
- Prefer `prefixIcon` on inputs like email/phone to aid recognition.
- Keep required fields explicit via `->required()`.

## Validation States
- Use Filament built-in validation; avoid complex dynamic `rule()` closures.
- Prefer component constraints (`minDate`, `maxLength`, `numeric`, `minValue`, `maxValue`).

## Sections & Grouping
- Group fields by meaning: Details, Content, Status, Dates, Associations.
- Each section defines its own `columns` for responsive control.

## Dark/Light Mode
>- Use default Filament theme colors and components; they are theme-aware.

## Examples
- Two-column section: `Section::make('Details')->columns(['sm' => 1, 'md' => 2])`
- Three-column responsive: `Section::make('Checklist')->columns(['sm' => 1, 'md' => 2, 'xl' => 3])`

