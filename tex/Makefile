SRC_PAPERS := $(wildcard papers/*.pdf)
DST_PAPERS := $(patsubst %.pdf, %.txt, $(SRC_PAPERS))

%.txt : %.pdf
	pdftotext $< $@

all:	thesis

thesis:	thesis.pdf


papers: $(DST_PAPERS)

%.pdf : %.tex
	pdflatex -interaction=nonstopmode --draft $<
	bibtex $(<:.tex=)
	makeglossaries $(<:.tex=)
	pdflatex -interaction=nonstopmode --draft $<
	pdflatex -synctex=1 -interaction=nonstopmode $<


sync:	thesis.pdf
	rsync thesis.pdf rsync://hidde@hidde.bolkhuis.nl/www --password-file=$$HOME/.rsync_passwd

clean:
	rm -f papers/*.txt *.pdf *.aux *.bbl *.blg *.out *.bak *.log *~ *.synctex.gz *.lof *.lol *.toc *.urlo *.glo *.ist *.gls *.glg *.urls

.PHONY: clean
